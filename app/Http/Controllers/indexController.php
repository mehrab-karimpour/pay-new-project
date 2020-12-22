<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SoapClient;


class indexController extends Controller
{
    protected $data;

    public function index()
    {
        return view('index.index');
    }

    public function pay(Request $request)
    {
        $this->data = $request;
        DB::transaction(function () {
            $name = $this->data->name;
            $lastName = $this->data->lastName;
            $nationalCode = $this->data->nationalCode;
            $birthDate = Carbon::now()->format('Y-m-d'); //$this->data->birthDate;
            $mobile = $this->data->mobile;
            $amount = $this->data->amount;
            $status = 'در خواست فقط ثبت شده است ';
            try {
                DB::insert("insert into orders (name,lastName,nationalCode,birthDate,mobile,amount,status)
                    VALUES (?,?,?,?,?,?,?)", [$name, $lastName, $nationalCode, $birthDate, $mobile, $amount, $status]);
            } catch (\Exception $e) {
                Log::error($e);
            }
        });


        $carbon = new Carbon(); // Now()
        $localDate = $carbon->format('Ymd');
        $localTime = $carbon->format('His');

        $data = [
            'terminalId' => '1076374',
            'userName' => 'abcuser',
            'userPassword' => '125890',
            'orderId' => "34",
            'amount' => "400000",
            'localDate' => $localDate,
            'localTime' => $localTime,
            'additionalData' => ' ',
            'callBackUrl' => 'https://barnamenevisi.com/tutorials/laravel-bpmellat',
            'payerID' => 0,
        ];

        try {
            $bankUrl="https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl";
            $soapClient = new SoapClient($bankUrl);
            $res = $soapClient->bpPayrequest($data);
            // return object: return :"0,9237456928347236"
            $res = explode(',', $res->return);
            if ($res[0] == "0") {
                return view('sms/success')->with(['tokenId' => $res[1]]);
            }
            return  $res;
        } catch (\Throwable $e) {
            dd($e);
            return false;
        }

    }


    public function verify(Request $request)
    {

        $transaction = Transaction::where('transaction_id', $request->SaleOrderId)->get()->first();
        $order = Order::where('order_id', $transaction->order_id)->get()->first();

        $data = [
            'terminalId' => config('app.mellat_terminal'),
            'userName' => config('app.mellat_username'),
            'userPassword' => config('app.mellat_password'),
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
                    'status'=> 1,
                    'ref_id' => $request->RefId,
                    'sale_ref_id' =>$request->SaleReferenceId,
                    'res_code' =>$request->ResCode,
                    'msg' => 'تراکنش موفقیت آمیز بود'
                ]);
                $order->update(['status' => 1]);
                return view('verify')->with([
                    'msg' => 'با تشکر تراکنش موفقیت آمیز بوده است',
                    'downloadLink' => 'https://barnamenevisi.com/dl/' . $order->downloadLink
                ]);
            } else {
                //Failed verify
                $transaction->update([
                    'status'=> 0,
                    'msg' => 'مشکل در تایید از سمت بانک'
                ]);
                $order->update(['status' => 0]);
                return view('vendor.error')->with(['msg' => 'تراکنش ناموفق بوده پول بعد از ۷۲ ساعت بازگشت داده میشود']);
            }
        } else {
            //Failed verify
            $transaction->update([
                'status'=> 0,
                'msg' => 'مشکل در تایید از سمت بانک'
            ]);
            $order->update(['status' => 0]);
            return view('vendor.error')->with(['msg' => 'تراکنش ناموفق بوده پول بعد از ۷۲ ساعت بازگشت داده میشود']);
        }

    }

    protected function _getVerify($data)
    {

        try{
            $soapClient = new SoapClient($this->bankUri);
            $res = $soapClient->bpVerifyRequest($data);
            //return object: return:0|false
            if($res->return == "0")
                return true;
            else
                return false;
        }catch(\Throwable $e){
            dd($e);
            return false;
        }
    }

    protected function _getSettle($data)
    {
        try{
            $soapClient = new SoapClient($this->bankUri);
            $res = $soapClient->bpSettleRequest($data);
            //return object: return:0|false
            if($res->return == "0")
                return true;
            else
                return false;
        }catch(\Throwable $e){
            dd($e);
            return false;
        }
    }

    public function messageHandle(Request $request)
    {
        $mobiles = $request->mobile_to;
        $smsBody = $request->text;


        $req = [
            'SmsBody' => $smsBody,
            'Mobiles' => $mobiles
        ];

        $this->url = "http://sms.parsgreen.ir";
        $apikey = 'F715070E-4638-4BCF-8EEE-E9E7DB9AF6EB';
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

    }

}
