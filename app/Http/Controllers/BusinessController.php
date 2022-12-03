<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function homepage(Request $request, $business)
    {

        $business = Business::findOrFail($business);



        $customPagesDeadlines = DB::select(DB::raw("select businesses.id as businessId, custom_pages.id as customPageId,custom_pages.name as customPageName ,
        custom_tables.column_2 as end_time,custom_tables.column_3,custom_tables.column_4,column_names.name_column_2,column_names.name_column_3,column_names.name_column_4 from businesses
        
        inner join custom_pages on custom_pages.business_id = businesses.id
        inner join custom_tables on custom_tables.custom_page_id = custom_pages.id
        inner join column_names on column_names.custom_page_id = custom_pages.id
        
        
        where businesses.id = $business->id and custom_tables.column_2 is not null
         
        
        order by custom_tables.column_2 "));





        $deadlines = [...$customPagesDeadlines];




        $posts =  DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->orderByDesc('created_at')
            ->limit(3)
            ->get();




        usort($deadlines, function ($item1, $item2) {

            return $item1->end_time <=> $item2->end_time;
        });



        return view('businessHome', compact('business', 'deadlines', 'posts'));
    }
}
