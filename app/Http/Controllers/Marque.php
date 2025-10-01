<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Marque extends Controller
{
    public function index()
    {
        $marques = \App\Models\marque::all();
        return view('admin.marque', compact('marques'));
    }

    public function destroy($id)
    {
        $marque = \App\Models\marque::findOrFail($id);
        $marque->delete();

        return redirect()->route('dashboard.marque')->with('success', 'Marque supprimée avec succès.');
    }
}
