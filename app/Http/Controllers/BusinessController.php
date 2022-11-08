<?php

namespace App\Http\Controllers;

use App\Models\Business;

use Illuminate\Http\Request;


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



        return view('business.homepage', compact('business'));
    }
}
