<?php

namespace App\Http\Controllers;

use App\Models\catagory;
use App\Http\Requests\StorecatagoryRequest;
use App\Http\Requests\UpdatecatagoryRequest;

class CatagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.category.index', [
            "title" => "Create category",
            "status" => "",
            'category' => catagory::all()
        ]);
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
    public function store(StorecatagoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(catagory $catagory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(catagory $catagory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecatagoryRequest $request, catagory $catagory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(catagory $catagory)
    {
        //
    }
}
