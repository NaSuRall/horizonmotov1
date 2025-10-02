<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
  public function index()
    {
        $produits = \App\Models\Produit::all();
        $categories = \App\Models\Categories::all();
        $marques = \App\Models\marque::all();
        return view('admin.produits', compact('produits', 'categories', 'marques'));
    }

    public function store(Request $request)
    {
        $imagePath = null;
        
        // Gérer l'upload de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits', 'public');
        }
        
        \App\Models\Produit::create([
            'name' => $request->name,
            'description' => $request->description,
            'reference' => $request->reference,
            'image' => $imagePath,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'marque_id' => $request->marque_id,
        ]);

        return redirect()->back()->with('success', 'Produit créé avec succès');
    }

    public function edit($id)
    {
        $produits = \App\Models\Produit::all();
        return view('admin.produits', compact('produits'));
    }

    public function update(Request $request, $id)
    {
        $produit = \App\Models\Produit::findOrFail($id);
        
        $updateData = [
            'name' => $request->name,
            'description' => $request->description,
            'reference' => $request->reference,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'marque_id' => $request->marque_id,
        ];
        
        // Gérer l'upload de la nouvelle image
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($produit->image) {
                \Storage::disk('public')->delete($produit->image);
            }
            $updateData['image'] = $request->file('image')->store('produits', 'public');
        }
        
        $produit->update($updateData);

        return redirect()->back()->with('success', 'Produit modifié avec succès');
    }

    public function destroy($id)
    {
        $produit = \App\Models\Produit::findOrFail($id);
        
        // Supprimer l'image si elle existe
        if ($produit->image) {
            \Storage::disk('public')->delete($produit->image);
        }
        
        $produit->delete();

        return redirect()->route('dashboard.produit')->with('success', 'Produit supprimé avec succès.');
    }
}
