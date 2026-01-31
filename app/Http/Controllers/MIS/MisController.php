<?php

namespace App\Http\Controllers\MIS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MisController extends Controller
{
    public function dashboard(){
        return view('mis.test');
    }
}
