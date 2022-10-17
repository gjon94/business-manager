<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BusinessManageEmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$businessId)
    {
        // dd(auth()->user());
        dd($businessId);
        
        
        $business = Business::findOrFail($businessId);
      
        $this->authorize('viewAny', $business);
        

        $employees = $business->employees;
        
        return view('business.index',compact('business','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($businessId)
    {
        //form creazione dipendenti dalla route business
        
        $business = Business::findOrFail($businessId);
       
        //controllo role/form visibile solo chi ha il permesso
        $this->authorize('create', $business);

        return view('business.create',compact('business'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $businessId)
    {
        // invio dati utente per registrare
        
        $business = Business::findOrFail($businessId);

        $this->authorize('create', $business);

        // $password = Str::random(10);
        $password = "password";

        $employee = new Employee;
        $employee->business_id = $businessId;
        $employee->password = Hash::make($password);
        $employee->role = $request->role;
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->dateOfBirth = $request->dateOfBirth;
        $employee->save();


       
        return redirect(route('business.homepage',['businessId'=>$businessId]))->with(['success_mess'=>$password]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($businessId, $employeeId)
    {
        dd($employeeId, $businessId);
        $employee = Employee::findOrFail($employeeId);
        $business = Business::findOrFail($businessId);

        
         $this->authorize('view',$business);

         return view('business.employee.profile',compact(['employee','business']));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($businessId, $employeeId)
    {
        $business = Business::findOrFail($businessId);
        $employee = Employee::findOrFail($employeeId);

        
        return view('business.employee.editForm',compact('employee','businessId'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $businessId,$employeeId)
    {
        $business = Business::findOrFail($businessId);

        $this->authorize('update',$business);
        
        $employee = Employee::findOrFail($employeeId);
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->save();

        return redirect(route('business.homepage',$businessId));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($businessId, $employeeId)
    {
       $business = Business::findOrFail($businessId);

       
       $employee = Employee::findOrFail($employeeId);
       
       $this->authorize('delete',[$business, $employee]);
       
       $employee->delete();

       return redirect()->back();

    }
}