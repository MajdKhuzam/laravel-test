<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Expr\Throw_;

use function PHPUnit\Framework\throwException;

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

    function DMStoDD($deg, $min, $sec, $dir)
    {
        // Converting DMS ( Degrees / minutes / seconds ) to decimal format
        $result = $deg + ((($min * 60) + ($sec)) / 3600);
        if($dir == 'N' || $dir == 'E'){
            return $result;
        }
        else if($dir == 'S' || $dir == 'W'){
            return -$result;
        }
    }

    public function haversine($point1, $point2)
    {

        $lat1 = $this->DMStoDD($point1[0][0], $point1[0][1], $point1[0][2], $point1[0][3]);
        $lon1 = $this->DMStoDD($point1[1][0], $point1[1][1], $point1[1][2], $point1[1][3]);
        $lat2 = $this->DMStoDD($point2[0][0], $point2[0][1], $point2[0][2], $point2[0][3]);
        $lon2 = $this->DMStoDD($point2[1][0], $point2[1][1], $point2[1][2], $point2[1][3]);
        // $lat1 = $point1[0];
        // $lon1 = $point1[1];
        // $lat2 = $point2[0];
        // $lon2 = $point2[1];

        $phi1 = $lat1 * pi() / 180;
        $phi2 = $lat2 * pi() / 180;
        $d_phi  = ($lat2 - $lat1) * pi() / 180;
        $d_lambda = ($lon2 - $lon1) * pi() / 180;

        $a = pow(sin($d_phi / 2), 2) + cos($phi1) * cos($phi2) * pow(sin($d_lambda / 2), 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        define('R', 6371); // Earth Radius
        $d = R * $c;

        return $d;
    }

    public function index()
    {
        $point1 = [[52, 03, 59, 'N'], [48, 42, 53, 'W']];
        $point2 = [[58, 38, 38, 'N'], [006, 04, 12, 'E']];
        $result = $this->haversine($point1, $point2);

        return view('anything', ['result' => $result]);
    }
}
