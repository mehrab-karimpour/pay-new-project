<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use SoapClient;

class messageController extends Controller
{

    protected $data;
    protected $amount;
    protected $order;
    private $terminalId;
    private $userName;
    private $userPassword;
    protected $email_of;

    public function messagePay(Request $request)
    {

        return $this->messageHandle($request);

        /*if ($request->sendEmail == 'on') {
            $validator = validator($request->all(), [
                'message_to_name' => 'required|string',
                'message_of_name' => 'required|string',
                'text' => 'required|string',
                'mobile_of' => 'required|string',
                'email_of' => 'required|email',
                'email_to' => 'required',
            ]);
        } else if ($request->sendMessage == 'on') {
            $validator = validator($request->all(), [
                'message_to_name' => 'required|string',
                'message_of_name' => 'required|string',
                'text' => 'required|string',
                'mobile_of' => 'required|string',
                'numberMobileOf' => 'required|email',
                'numberMobileTo' => 'required|email',
            ]);
        } else {
            $validator = validator($request->all(), [
                'message_to_name' => 'required|string',
                'message_of_name' => 'required|string',
                'text' => 'required|string',
                'mobile_of' => 'required|string',
                'sendMessage' => 'required',
            ]);
        }
        if ($validator->fails())
            return redirect()->back()->withErrors($validator->errors())->with('error', 'message');


        $this->data = $request;

        DB::transaction(function () {

            $amount = DB::table('amounts')->where('title', '=', 'amount-message')->first()->amount;

            $status = 'در خواست فقط ثبت شده است ';
            try {
                DB::insert("insert into orders (amount,status) VALUES (?,?)", [$amount, $status]);
                $this->order = DB::table('orders')->orderByDesc('id')->first();
                $this->amount = DB::table('amounts')->where('title', '=', 'amount-message')->first();
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
            'terminalId' => '**************',
            'userName' => '***************',
            'userPassword' => '**************',
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
        }*/
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
                return $this->messageHandle($this->data);
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
            dd($e);
            return false;
        }
    }

    public function messageHandle($request)
    {


        // check user select send using message  or send using email !
        if ($request->sendEmail == "on") {
            foreach ($request->email_to as $email) {
                $to_name = $request->message_to_name;
                $this->email_of = $request->email_of;
                $data = array('name' => "Sam Jose", "body" => "Test mail");
                $to_email = $email;
                $data = array('name' => $to_name, 'body' => '');
                Mail::send('mail.index', $data, function ($message) use ($to_name, $to_email) {
                    $message->to($to_email, $to_name)->subject('ارسال پیام همدلی');
                    $message->from($this->email_of, '');
                });
            }
        }

        if ($request->sendMessage == "on") {

            $mobiles = $request->mobile_to;
            $smsBody = $request->text;


            $req = [
                'SmsBody' => $smsBody,
                'Mobiles' => $mobiles
            ];

            $this->url = "http://sms.parsgreen.ir";
            $apikey = '***************************';
            $urlpath = "Message/SendSms";

            try {
                $this->url = $this->url . '/Apiv2/' . $urlpath;
                $ch = curl_init($this->url);
                $jsonDataEncoded = json_encode($req);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                $header = array('authorization: BASIC APIKEY:' . $apikey, 'Content-Type: application/json;charset=utf-8');
                curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
                $result = curl_exec($ch);
                $res = json_decode($result);
                curl_close($ch);
                if ($res->R_Success == false)
                    return view('sms.error');
                return view('sms.success');
            } catch (Exception $ex) {
                return '';
            }
        } else {

        }

    }
}
