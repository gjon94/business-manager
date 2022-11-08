<?php

namespace App\Http\Controllers;

use App\Models\CustomTable;
use Illuminate\Http\Request;

class CustomTableControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $businessId, $customPageId)
    {


        $request->validate([
            'column_1' => 'date|nullable',
            'column_2' => 'date|nullable',

        ]);

        $custom_table = new CustomTable;
        $custom_table->custom_page_id = $customPageId;


        //date inmputs



        $custom_table->column_1 = $request->column_1;
        $custom_table->column_2 = $request->column_2;



        //

        $custom_table->column_3 = $request->column_3;
        $custom_table->column_4 = $request->column_4;
        $custom_table->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd('s');
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
    public function update(Request $request, $businessId, $customPageId, $tableId)
    {
        $custom_table = CustomTable::findOrFail($tableId);

        $custom_table->column_1 = $request->column_1;
        $custom_table->column_2 = $request->column_2;
        $custom_table->column_3 = $request->column_3;
        $custom_table->column_4 = $request->column_4;
        $custom_table->save();
        return back();
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
