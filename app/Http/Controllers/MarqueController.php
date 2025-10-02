<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marque;

class MarqueController extends Controller
{
    public function index()
    {
        $marques = \App\Models\marque::all();
        return view('admin.marque', compact('marques'));
    }

    public function store(Request $request)
    {
        marque::create([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $marques = \App\Models\marque::all();
        return view('admin.marque', compact('marques'));
    }

    public function update(Request $request, $id)
    {
        $marque = marque::findOrFail($id);
        
        $marque->update([
            'nom' => $request->nom,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Marque modifiée avec succès');
    }



    public function destroy($id)
    {
        $marque = \App\Models\marque::findOrFail($id);
        $marque->delete();

        return redirect()->route('dashboard.marque')->with('success', 'Marque supprimée avec succès.');
    }
}
