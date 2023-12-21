<?php

namespace App\Http\Controllers;

use App\Models\Aws;
use App\Models\WaterLevel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $awsHome = Aws::mainData();
        $wlHome = WaterLevel::mainData();
        // dd($wlHome);
        return view('index', ['awsHome' => $awsHome, 'wlHome' => $wlHome]);
    }
}
