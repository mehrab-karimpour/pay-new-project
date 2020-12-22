<?php

namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;

class indexController extends Controller
{

    public function index()
    {
        return view('index.index');
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
