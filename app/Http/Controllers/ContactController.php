<?php


namespace App\Http\Controllers;


use App\Http\Models\Role;
use App\Http\Models\User;
use http\Env\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }
}
