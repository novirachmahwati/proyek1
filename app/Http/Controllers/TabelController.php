<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TabelController extends Controller
{
    /**
     * 
     * @param  Request  $request
     * @param  integer  $n
     * @return Response
     */
    public function index(Request $request, $n)
    {
        $y = 0;
        for ($x = 1; $x <= $n; $x++) {
        $y= $y+$x;
        echo "$x = $y <br>";
        }
    }
}
