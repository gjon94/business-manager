<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        
        

        
        if(auth('employee')->user()){
            Auth::shouldUse('employee');
        }
        
        return view('employee.home');
    }
}
