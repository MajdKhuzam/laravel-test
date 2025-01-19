<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRcodeController extends Controller
{
    public function generate(){
        $qrcode = QrCode::size(200)->generate('https://google.com');
        return view('about', ['qrcode' => $qrcode]);
    }
}
