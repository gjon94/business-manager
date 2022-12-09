<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    public function index()
    {

        $business = auth()->user()->getMyCompany;



        return view('employeeProfile', compact('business'));
    }
}
