<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function user()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }
    

    public function store(Request $request)
    {
       
        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back();
    }



    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();


        return redirect()->back();
    }



}
