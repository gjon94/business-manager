<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$businessId)
    {
       
        
        $business = Business::findOrFail($businessId);
      
        $this->authorize('viewAny', $business);
        

        $employees = $business->employees;
        
        return view('business.index',compact('business','employees'));
    }





    
}
