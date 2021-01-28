<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = Users::latest()->paginate(5);

        return view('users.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);

        Users::create($request->all());

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Users $user)
    {
        //
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Users $user)
    {
            $request->validate([
            'name' => 'required',
            'email' => 'required',
            'description' => 'required'
            ]);
            $user->update($request->all());
    
            return redirect()->route('users.index')
                ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        //
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
