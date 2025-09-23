<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class DashboardController extends Controller
{
    

    public function index()
    {
        $count = User::count();
        return view('admin.dashboard', compact('count'));
    }
}
