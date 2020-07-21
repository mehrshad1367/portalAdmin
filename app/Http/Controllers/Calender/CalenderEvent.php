<?php

namespace App\Http\Controllers\Calender;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalenderEvent extends Controller
{
    public function index()
    {
        return view('calender.index');
    }
}
