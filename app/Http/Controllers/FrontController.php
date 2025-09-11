<?php

namespace App\Http\Controllers;

use App\Models\front;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('nike.adminpannel');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('frontend.about');
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
    public function show(front $front)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(front $front)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, front $front)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(front $front)
    {
        //
    }
}
