<?php

namespace App\Http\Controllers;

use App\Models\Business;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $businessId)
    {

        $business = Business::findOrFail($businessId);

        $this->authorize('viewAny', $business);

        $customPagesDeadlines = DB::select(DB::raw("select businesses.id as businessId, custom_pages.id as customPageId,custom_pages.name as customPageName ,
        custom_tables.column_2 as end_time,custom_tables.column_3,custom_tables.column_4,column_names.name_column_2,column_names.name_column_3,column_names.name_column_4 from businesses
        
        inner join custom_pages on custom_pages.business_id = businesses.id
        inner join custom_tables on custom_tables.custom_page_id = custom_pages.id
        inner join column_names on column_names.custom_page_id = custom_pages.id
        
        
        where businesses.id = $business->id and custom_tables.column_2 is not null
         
        
        order by custom_tables.column_2 "));


        $employeeDeadlines = DB::select(DB::raw("select employees.id as employeeId,employees.business_id as businessId,name ,surname,deadlines.end_time from employees
        inner join contracts on contracts.id = employees.contract_id
        inner join deadlines on deadlines.id = contracts.deadline_id
        
        where employees.business_id = $business->id 


        order by deadlines.end_time"));


        $deadlines = [...$customPagesDeadlines, ...$employeeDeadlines];




        usort($deadlines, function ($item1, $item2) {

            return $item1->end_time <=> $item2->end_time;
        });



        return view('businessHome', compact('business', 'deadlines'));
    }
}
