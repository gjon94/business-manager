<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Contract;
use App\Models\Deadline;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
    public function index(Request $request, $businessId)
    {

        $business = Business::findOrFail($businessId);

        $this->authorize('view', $business);


        // $employees = $business->employees;

        $employees =  DB::table('employees')
            ->join('contracts', 'contracts.id', '=', 'employees.contract_id')
            ->join('deadlines', 'deadlines.id', '=', 'contracts.deadline_id')
            ->select('deadlines.*', 'contracts.currency', 'employees.*')
            ->where('employees.business_id', $business->id)
            ->orderBy('end_time')
            ->get();


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

        //controllo role/form visibile solo chi ha il permesso
        $this->authorize('create', $business);

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

        $this->authorize('create', $business);




        $_userRoleLevel = auth()->user()->role ?? 10;
        $_ruleForRole = 'required|integer|min:' . $_userRoleLevel . '|max:10';

        $request->validate([
            'contract_type_id' => 'required',
            'start_time' => 'required|date|before:' . $request->end_time,
            'end_time' => 'required|date',
            'hourly_pay' => 'required',
            'role' => $_ruleForRole,
            'name' => 'required',
            'dateOfBirth' => 'required|date',
        ]);



        $deadline = new Deadline();
        $deadline->start_time = $request->start_time;
        $deadline->end_time = $request->end_time;
        $deadline->save();

        $contract = new Contract();
        $contract->contract_type_id = $request->contract_type_id;
        $contract->deadline_id = $deadline->id;
        $contract->hourly_pay = $request->hourly_pay;
        $contract->currency = $request->currency;
        $contract->save();


        $employee = new Employee;
        $employee->business_id = $businessId;
        $employee->password = Hash::make('password');
        $employee->role = $request->role;
        $employee->email = $request->email;
        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->contract_id = $contract->id;
        $employee->dateOfBirth = $request->dateOfBirth;
        $employee->save();



        return redirect(route('business.employees.index', $businessId));
    }

    /**
     * Display the specified employee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($businessId, $employeeId)
    {

        $business = Business::findOrFail($businessId);

        $this->authorize('view', $business);


        $employee = Employee::findOrFail($employeeId);



        if ($employee->business_id !== $business->id) {
            abort(404);
        }

        echo json_encode($employee);
        return view('businessEmployeeShow', compact(['employee', 'business']));
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

        if ($business->id !== $employee->business_id) {
            abort(404);
        }

        $this->authorize('update', $business);




        return view('business.employee.editForm', compact('employee', 'businessId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $businessId, $employeeId)
    {
        $business = Business::findOrFail($businessId);
        $employee = Employee::findOrFail($employeeId);

        if ($business->id !== $employee->business_id) {
            abort(404);
        }

        $this->authorize('update', $business);

        $employee->name = $request->name;
        $employee->surname = $request->surname;
        $employee->save();

        return redirect(route('business.employees.index', $businessId));
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

        if ($business->id !== $employee->business_id) {
            abort(404);
        }

        $this->authorize('delete', $business);


        if ($employee->delete()) {
            return redirect(route('business.employees.index', $businessId))->with('success', 'employee deleted');
        } else {
            return redirect(route('business.employees.index', $businessId))->withErrors('Qualcosa è andatao storto..');
        }
    }
}
