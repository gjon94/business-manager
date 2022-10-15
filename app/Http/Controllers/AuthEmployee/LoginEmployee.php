<?php

namespace App\Http\Controllers\AuthEmployee;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginRequestEmployee extends LoginRequest{
    public function rules()
    {
        
        return [
            'id' => ['required','string'],
            'password' => ['required', 'string'],
            
        ];
    }
}

class LoginEmployee extends Controller
{

    

    public function create()
    {
      
        return view('employee.login');
    }
    
    public function store(LoginRequestEmployee $request)
    {
        $request->authenticateEmployee();
        
        
        $request->session()->regenerate();
        
        return redirect('/employee');
    }

 
  
}