<?php

namespace App\Http\Controllers;

use App\Models\Plans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        dd(Auth::guard('admin')->user());
        $data['data'] = Plans::paginate(10);
        return view('admin.plans.all', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Plans $plans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plans $plans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Plans $plans)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plans $plans)
    {
        //
    }
}
