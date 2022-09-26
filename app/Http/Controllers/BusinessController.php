<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$businessName)
    {
        
        $business = Business::findOrFail($businessName);
       
        $this->authorize('viewAny', $business);

        $employees = $business->employees;
        
        return view('business.index',compact('business','employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($businessName)
    {
        //form creazione dipendenti dalla route business
        
        $business = Business::findOrFail($businessName);
       
        //controllo role/form visibile solo chi ha il permesso
        $this->authorize('create', $business);

        return view('business.create',compact('businessName'));
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

        $employee = new Employee;
        $employee->business_id = $businessId;
        $employee->role = $request->role;
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->dateOfBirth = $request->dateOfBirth;
        $employee->save();

       
        return redirect(route('business.index',['businessName'=>$businessId]));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        // $business = Business::findOrFail($id);
        // $employees = null;
        // return view('business.show',compact('business','employees'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
