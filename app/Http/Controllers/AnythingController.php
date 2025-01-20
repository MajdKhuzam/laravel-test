<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnythingController extends Controller
{
    public function distance($point1, $point2){
        $x1 = $point1[0];
        $y1 = $point1[1];
        $x2 = $point2[0];
        $y2 = $point2[1];
        return sqrt(pow($x2 - $x1, 2)+pow($y2 - $y1, 2));
    }

    public function index(){
        $point1 = [1,2];
        $point2 = [1,5];
        $result = $this->distance($point1, $point2);
        return view('anything', ['result' => $result]);
    }
}
