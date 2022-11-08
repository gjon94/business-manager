<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {





        if (auth('employee')->user()) {
            Auth::shouldUse('employee');
        } else {
            Auth::logout();
            return redirect(route('employee.login'));
        }

        return view('employee.home');
    }
}
