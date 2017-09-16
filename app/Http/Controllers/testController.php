<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sms\sms;
use Session;

class testController extends Controller
{
    public function sms(){
       $sms = new sms;
           // var_dump($check->showkey());
            $digits = 5;
            $code = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
          
            Session::put('sms',$code);
            $sms->sendMessage("Verification Code",$code,'','','0546119202','Emmat Mall');

    }
}
