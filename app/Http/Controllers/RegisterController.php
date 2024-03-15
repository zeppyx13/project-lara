<?php

namespace App\Http\Controllers;

use App\Models\register;
use App\Models\User;
use App\Http\Requests\StoreregisterRequest;
use App\Http\Requests\UpdateregisterRequest;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register.index', [
            "title" => "Register",
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
    public function store(StoreregisterRequest $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:35',
            'username' => 'required|min:5|max:15|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'

        ]);
        User::create($validatedData);
        session()->flash('berhasil', 'Registration Successful');
        return redirect('/Login');
    }

    /**
     * Display the specified resource.
     */
    public function show(register $register)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(register $register)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateregisterRequest $request, register $register)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(register $register)
    {
        //
    }
}
