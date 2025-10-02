<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\marque;

class DashboardController extends Controller
{
    

    public function index()
    {
        $count = User::count();
        $marquesCount = \App\Models\marque::count(); 
        $marques = marque::all();
        $categories = \App\Models\Categories::all(); // Récupérer toutes les catégories
        return view('admin.dashboard', compact('count', 'marquesCount', 'marques', 'categories'));
    }
}
