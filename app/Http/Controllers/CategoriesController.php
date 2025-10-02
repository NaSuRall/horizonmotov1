<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Categories::all();
        return view('admin.categorie', compact('categories'));
    }

    public function store(Request $request)
    {
        \App\Models\Categories::create([
            'name' => $request->name,
        ]);

        return redirect()->back();
    }

    public function edit($id)
    {
        $categories = \App\Models\Categories::all();
        return view('admin.categorie', compact('categories'));
    }

    public function update(Request $request, $id)
    {
        $categorie = \App\Models\Categories::findOrFail($id);
        
        $categorie->update([
            'name' => $request->name,
        ]);

        return redirect()->back()->with('success', 'Catégorie modifiée avec succès');
    }


    public function destroy($id)
    {
        $categorie = \App\Models\Categories::findOrFail($id);
        $categorie->delete();

        return redirect()->route('dashboard.categorie')->with('success', 'Catégorie supprimée avec succès.');
    }
}
