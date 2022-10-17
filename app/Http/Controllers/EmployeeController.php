<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index(){
        
        

        dd(auth('employee')->user());
        // if(!auth('employee')->user()){
        //     return redirect(route('employee.show'));
        // }
        return view('employee.home');
    }
}
