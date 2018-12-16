<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penyakit;
use App\ListGejala;

class WebAppController extends Controller
{
    public function index(){
        return view('index');
    }
}
