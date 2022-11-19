<?php

namespace App\Http\Controllers;

use App\Models\Business;
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
        $business = Business::findOrFail($businessId);

        return view('customPageCreate', compact('business'));
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

            (!$request->name_column_1) ?: $column_name->name_column_1 = $request->name_column_1;
            (!$request->name_column_2) ?: $column_name->name_column_2 = $request->name_column_2;
            (!$request->name_column_3) ?: $column_name->name_column_3 = $request->name_column_3;
            (!$request->name_column_4) ?: $column_name->name_column_4 = $request->name_column_4;
        } else {
            $custom_page->delete();
            return abort(500);
        }


        if ($column_name->save()) {

            return redirect(route('business.homepage', $businessId));
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

        $business = Business::findOrFail($businessId);

        $customPage = CustomPage::findOrFail($pageId);
        $customTables = $customPage->customTables;
        $columnNames = $customPage->column_names;


        return view('customPage', compact('business', 'customPage', 'customTables', 'columnNames'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($businessId, $customPageId)
    {
        $business = Business::findOrFail($businessId);
        $customPage = CustomPage::findOrFail($customPageId);
        $columnNames = $customPage->column_names;


        return view('customPageEdit', compact('business', 'customPage', 'columnNames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $businessId, $customPageId)
    {
        $customPage = CustomPage::findOrFail($customPageId);

        $customPage->name = $request->name;
        $customPage->description = $request->description;
        $customPage->save();

        $columnNames = $customPage->column_names;
        $columnNames->name_column_1 = $request->name_column_1;
        $columnNames->name_column_2 = $request->name_column_2;
        $columnNames->name_column_3 = $request->name_column_3;
        $columnNames->name_column_4 = $request->name_column_4;
        $columnNames->save();
        return redirect(route('business.page.custom-page.show', [$businessId, $customPageId]));
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
