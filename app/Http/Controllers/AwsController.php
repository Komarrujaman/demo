<?php

namespace App\Http\Controllers;

use App\Models\Aws;
use Illuminate\Http\Request;

class AwsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.details.aws');
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
    public function show()
    {
        return view('page.device.aws.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aws $aws)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aws $aws)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aws $aws)
    {
        //
    }
}
