<?php

namespace App\Http\Controllers;

use App\Models\ColumnName;
use App\Models\CustomPage;
use App\Models\CustomTable;
use Illuminate\Http\Request;

class CustomPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($businessId)
    {
        $custom_pages = CustomPage::all()->where('business_id', $businessId);

        return view('business.custom-page.index', compact('businessId', 'custom_pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($businessId)
    {
        return view('business.custom-page.create', compact('businessId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $businessId)
    {

        $request->validate([
            'name' => 'required|string|min:1|max:20',
            'description' => 'required|string|max:20',
        ]);

        $custom_page = new CustomPage;
        $custom_page->business_id = $businessId;
        $custom_page->name = $request->name;
        $custom_page->description = $request->description;




        if ($custom_page->save()) {
            $column_name = new ColumnName;
            $column_name->custom_page_id = $custom_page->id;
        } else {
            $custom_page->delete();
            return abort(500);
        }


        if ($column_name->save()) {
            return redirect(route('business.page.custom-page.index', $businessId));
        } else {
            $custom_page->delete();

            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($businessId, $pageId)
    {

        $custom_page = CustomPage::findOrFail($pageId);
        $custom_tables = $custom_page->customTables;
        $column_names = $custom_page->column_names;



        return view('business.custom-page.show', compact('custom_page', 'custom_tables', 'column_names', 'businessId'));
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
    public function destroy($id)
    {
        //
    }
}
