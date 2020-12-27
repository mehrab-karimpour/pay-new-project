<?php

namespace App\Http\Controllers;


use App\Models\User;
use Carbon\Carbon;
use DateTime;
use GuzzleHttp\Client;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use SoapClient;


class indexController extends Controller
{
    protected $data;
    protected $order;
    protected $amount;
    protected $terminalId = '**************';
    protected $userName = '**************';
    protected $userPassword = '**************';
    public $bankUri = "https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl";





    public function mail()
    {
        $to_name = 'karen';
        $to_email = 'test@gmail.com';
        $data = array('name' => "Sam Jose", "body" => "Test mail");

        $to_name = 'ali';
        $to_email = 'mehra0bkarimpour@gmail.com';
        $data = array('name' => 'elmbvlembv', 'body' => 'mehra0bkarimpour@gmail.commehra0bkarimpour@gmail.com');
        Mail::send('mail.index', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject('mehra0bkarimpour@gmail.com');
            $message->from('mehra0bkarimpour@gmail.com', 'mehra0bkarimpour@gmail.com');
        });
    }

    public function cart()
    {
        return response()->view('cart.index');
    }

    public function index()
    {
        return view('index.index');
    }

    public function pay(Request $request)
    {

        $validator = validator($request->all(), [
            'name' => 'required',
            'lastName' => 'required|string',
            'nationalCode' => 'required|numeric',
            'birthDate' => 'required|string',
            'mobile' => 'required|string',
        ]);
        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors())->with('error', 'cart');


        $this->data = $request;


        DB::transaction(function () {
            $name = $this->data->name;
            $lastName = $this->data->lastName;
            $nationalCode = $this->data->nationalCode;
            $birthDate = $this->dateFormatter($this->data->birthDate);;
            $mobile = $this->data->mobile;
            $amount = $this->data->amount;
            $status = 'در خواست فقط ثبت شده است ';
            try {
                DB::insert("insert into orders (name,lastName,nationalCode,birthDate,mobile,amount,status)
                    VALUES (?,?,?,?,?,?,?)", [$name, $lastName, $nationalCode, $birthDate, $mobile, $amount, $status]);
                $this->order = DB::table('orders')->orderByDesc('id')->first();
                $this->amount = DB::table('amounts')->where('title', '=', 'amount-cart')->get()->first();
                \App\Models\Transaction::create([
                    'order_id' => $this->order->id,
                    'status' => 2,
                    'msg' => 'سعی در پرداخت کردن'
                ]);

            } catch (\Exception $e) {
                Log::error($e);
            }

        });


        $carbon = new Carbon(); // Now()
        $localDate = $carbon->format('Ymd');
        $localTime = $carbon->format('His');

        $data = [
            'terminalId' => '************',
            'userName' => '*************',
            'userPassword' => '***************',
            'orderId' => $this->order->id,
            'amount' => $this->amount->amount,
            'localDate' => $localDate,
            'localTime' => $localTime,
            'additionalData' => ' ',
            'callBackUrl' => route('verify'),
            'payerId' => 0,
        ];

        try {

            $bankUrl = "https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl";
            $soapClient = new SoapClient($bankUrl);
            $res = $soapClient->bpPayrequest($data);
            // return object: return :"0,9237456928347236"

            $res = explode(',', $res->return);
            if ($res[0] == "0") {
                return view('pay.success')->with(['tokenId' => $res[1]]);
            }
            return $res;

        } catch (\Throwable $e) {
            Log::error($e);
            return view('pay.error');
        }

    }


    public function verify(Request $request)
    {

        $transaction = \App\Models\Transaction::where('transaction_id', $request->SaleOrderId)->get()->first();
        $order = DB::table('orders')->where('order_id', $transaction->order_id)->get()->first();

        $data = [
            'terminalId' => $this->terminalId,
            'userName' => $this->userName,
            'userPassword' => $this->userPassword,
            'orderId' => $request->SaleOrderId,
            'saleOrderId' => $request->SaleOrderId,
            'SaleReferenceId' => $request->SaleReferenceId,
        ];

        if ($this->_getVerify($data)) {
            //Success
            if ($this->_getSettle($data)) {
                //success
                //Failed verify
                $transaction->update([
                    'status' => 1,
                    'ref_id' => $request->RefId,
                    'sale_ref_id' => $request->SaleReferenceId,
                    'res_code' => $request->ResCode,
                    'msg' => 'تراکنش موفقیت آمیز بود'
                ]);
                $order->update(['status' => 1]);
                return view('pay.success')->with([
                    'msg' => 'با تشکر تراکنش موفقیت آمیز بوده است',
                ]);
            } else {
                //Failed verify
                $transaction->update([
                    'status' => 0,
                    'msg' => 'مشکل در تایید از سمت بانک'
                ]);
                $order->update(['status' => 0]);
                return view('pay.error')->with(['msg' => 'تراکنش ناموفق بوده پول بعد از ۷۲ ساعت بازگشت داده میشود']);
            }
        } else {
            //Failed verify
            $transaction->update([
                'status' => 0,
                'msg' => 'مشکل در تایید از سمت بانک'
            ]);
            $order->update(['status' => 0]);
            return view('pay.error')->with(['msg' => 'تراکنش ناموفق بوده پول بعد از ۷۲ ساعت بازگشت داده میشود']);
        }
    }

    protected function _getVerify($data)
    {

        try {
            $soapClient = new SoapClient($this->bankUri);
            $res = $soapClient->bpVerifyRequest($data);
            //return object: return:0|false
            if ($res->return == "0")
                return true;
            else
                return false;
        } catch (\Throwable $e) {
            dd($e);
            return false;
        }
    }

    protected function _getSettle($data)
    {
        try {
            $soapClient = new SoapClient($this->bankUri);
            $res = $soapClient->bpSettleRequest($data);
            //return object: return:0|false
            if ($res->return == "0")
                return true;
            else
                return false;
        } catch (\Throwable $e) {
            Log::error($e);
            dd($e);
            return false;
        }
    }


    protected function dateFormatter($persianDate)
    {
        $p = explode('-', $persianDate);
        $v = Verta::getGregorian($this->to_en_numbers($p[0]), $this->to_en_numbers($p[1]), $this->to_en_numbers($p[2]));
        $date = new DateTime($v[0] . '-' . $v[1] . '-' . $v[2]);
        return $date->format('Y-m-d');
    }

    public function to_en_numbers(string $string): string
    {
        $persinaDigits1 = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
        $persinaDigits2 = ['٩', '٨', '٧', '٦', '٥', '٤', '٣', '٢', '١', '٠'];
        $allPersianDigits = array_merge($persinaDigits1, $persinaDigits2);
        $replaces = [...range(0, 9), ...range(0, 9)];

        return str_replace($allPersianDigits, $replaces, $string);
    }

}
