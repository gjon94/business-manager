<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Contract;
use App\Models\Deadline;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class BusinessManageEmployeesController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $business)
    {


        $this->authorize('indexEmployees', User::class);


        $business = Business::findOrFail($business);


        $employees = $business->employees;

        // dd($employees);

        // $employees =  DB::table('users')
        //     ->join('contracts', 'contracts.id', '=', 'users.contract_id')
        //     ->join('deadlines', 'deadlines.id', '=', 'contracts.deadline_id')
        //     ->select('deadlines.*', 'contracts.currency', 'users.*')
        //     ->where('users.business_id', $business->id)
        //     ->orderBy('end_time')
        //     ->get();

        $employees =  DB::table('users')
            ->join('contracts', 'contracts.id', '=', 'users.contract_id')

            ->select('contracts.*', 'users.*')
            ->where('users.business_id', $business->id)
            ->orderBy('end_time')
            ->get();

        // dd($employees);


        return view('businessEmployee', compact('business', 'employees'));
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

        $this->authorize('createEmployee', User::class);

        return view('businessEmployeeCreate', compact('business'));
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


        $this->authorize('createEmployee', User::class);






        $_ruleForRole = 'required|integer|min:' . auth()->user()->role + 1 . '|max:10';

        $request->validate([
            'contract_type_id' => 'required',
            'start_time' => 'required|date|before:' . $request->end_time,
            'end_time' => 'required|date',
            'hourly_pay' => 'required',
            'role' => $_ruleForRole,
            'name' => 'required',
            'birthday' => 'required|date',
        ]);





        $contract = new Contract();
        $contract->contract_type_id = $request->contract_type_id;
        $contract->hourly_pay = $request->hourly_pay;
        $contract->currency = $request->currency;
        $contract->start_time = $request->start_time;
        $contract->end_time = $request->end_time;
        $contract->save();


        $employee = new User;
        $employee->business_id = $businessId;
        $employee->password = Hash::make('password');
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->role = $request->role;
        $employee->birthday = $request->birthday;
        $employee->contract_id = $contract->id;
        $employee->save();

        // dd($employee);

        return redirect(route('business.employees.index', $businessId));
    }

    /**
     * Display the specified employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($businessId, User $employee)
    {
        // dd($employee);
        $business = Business::findOrFail($businessId);


        $contract = $employee->contract;






        return view('businessEmployeeShow', compact(['employee', 'business', 'contract']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($businessId, Employee $employee)
    {


        $business = Business::findOrFail($businessId);



        return view('business.employee.editForm', compact('employee', 'businessId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $businessId, User $employee)
    {


        $business = Business::findOrFail($businessId);


        $contract = $employee->contract;


        $_ruleForRole = 'required|integer|min:' . auth()->user()->role + 1 . '|max:10';


        $request->validate([
            'contract_type_id' => 'required',
            'start_time' => 'required|date|before:' . $request->end_time,
            'end_time' => 'required|date',
            'hourly_pay' => 'required',
            'role' => $_ruleForRole,
            'name' => 'required',
            'birthday' => 'required|date',
        ]);



        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->email_work = $request->email_work;
        $employee->role = $request->role;

        $contract->hourly_pay = $request->hourly_pay;
        $contract->currency = $request->currency;

        $contract->start_time = $request->start_time;
        $contract->end_time = $request->end_time;

        $employee->save();
        $contract->save();


        return redirect(route('business.employees.index', $businessId));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($businessId, User $employee)
    {

        $business = Business::findOrFail($businessId);


        if ($business->id !== $employee->business_id) {
            abort(404);
        }




        if ($employee->delete()) {
            return redirect(route('business.employees.index', $businessId))->with('success', 'employee deleted');
        } else {
            return redirect(route('business.employees.index', $businessId))->withErrors('Qualcosa è andatao storto..');
        }
    }
}
