<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnythingController extends Controller
{
    // public function distance($point1, $point2){
    //     $x1 = $point1[0];
    //     $y1 = $point1[1];
    //     $x2 = $point2[0];
    //     $y2 = $point2[1];
    //     return sqrt(pow($x2 - $x1, 2)+pow($y2 - $y1, 2));
    // }
    // public function index(){
    //     $point1 = [1,2];
    //     $point2 = [1,5];
    //     $result = $this->distance($point1, $point2);
    //     return view('anything', ['result' => $result]);
    // }
    
    public function haversine($point1, $point2){
        $lat1 = $point1[0];
        $lon1 = $point1[1];
        $lat2 = $point2[0];
        $lon2 = $point2[1];
        
        $phi1 = $lat1 * pi()/180;
        $phi2 = $lat2 * pi()/180;
        $d_phi  = ($lat2 - $lat1) * pi()/180;
        $d_lambda = ($lon2 - $lon1) * pi()/180;
        
        $a = pow(sin($d_phi/2), 2) + cos($phi1) * cos($phi2) * pow(sin($d_lambda/2), 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        define('R', 6371000); // Earth Radius
        $d = R * $c;

        return $d;
    }

    public function index(){
        $point1 = [53.32055555555556, -1.7297222222222221];
        $point2 = [53.31861111111111, -1.6997222222222223];
        $result = $this->haversine($point1, $point2);
        
        return view('anything', ['result' => $result]);
    }

}
