<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Session;
use Helpers;
class RegisterController extends Controller
{

    public function index()
    {
        return view('auth.register');
    }

   
    public function store(Request $request)
    {
     
        $email=$request->email;
        $name=$request->name;
        $password=$request->password;
        $confirm=$request->password_confirmation;
        if ($password==$confirm) {
            $store= new User();
            $store->email=$email;
            $store->password=bcrypt($password);
            $store->name=$name;
            $store->save();
            Helpers::alert('success','Your account has been created');
        } 
        else
        {
            Helpers::alert('danger','Password and password confirmation did not match');   
        } 
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
