<?php

namespace App\Http\Controllers;

use App\PasswordReset;
use Illuminate\Http\Request;

class PasswordResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['password_resets'] = PasswordReset::paginate(1000);

        return view('password_reset.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('password_reset.create');
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

        return redirect()->route('password_reset.index')->with("success", "Berhasil menambah password_reset");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    public function show(PasswordReset $password_reset)
    {
        //
        $data['password_reset'] = $password_reset;

        return view('password_reset.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    public function edit(PasswordReset $password_reset)
    {
        //
        $data['password_reset'] = $password_reset;

        return view('password_reset.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PasswordReset $password_reset)
    {
        //

        return redirect()->route('password_reset.index')->with("success", "Berhasil mengupdate PasswordReset");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PasswordReset  $password_reset
     * @return \Illuminate\Http\Response
     */
    public function destroy(PasswordReset $password_reset)
    {
        //
        $password_reset->delete();

        return redirect()->route('password_reset.index')->with("success", "Berhasil menghapus Password Reset");
    }
}
