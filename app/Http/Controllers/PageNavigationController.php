<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageNavigationController extends Controller
{
    public function customersNav()
    {
        return view('customers');
    }

    public function registrationNav()
    {
        return view('registration');
    }
}
