<?php

namespace App\Http\Controllers;

use App\Models\Aws;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $awsHome = Aws::mainData();
        return view('index', ['awsHome' => $awsHome]);
    }
}
