<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function doRegister(Request $request){
        $validatedData = $request->validate([
            'name'=>['required'],
            'firstname'=>['required'],
            'email'=>['required'],
            'idRole'=>['required'],
            'password'=>['required']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        //Create a new user with data received from the form
        User::create($validatedData);
        return redirect('/users')->with('success','Nouvel utilisateur ajouté');

    }

    public function show(){
        $users = User::all();

        return view('users',['users'=>$users]);
    }
}
