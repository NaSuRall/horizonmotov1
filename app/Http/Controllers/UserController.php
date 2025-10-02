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


    public function edit($id)
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
        ]);
        
        // Mettre à jour le mot de passe seulement s'il est fourni
        if ($request->filled('password')) {
            $user->update([
                'password' => bcrypt($request->password)
            ]);
        }

        return redirect()->back()->with('success', 'Utilisateur modifié avec succès');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();


        return redirect()->back();
    }



}
