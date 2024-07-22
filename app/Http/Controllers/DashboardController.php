<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'Fasilitasi | Dashboard',
        ]);
    }

    public function addEvents(){
        return view('dashboard.create.index', [
            'title' => 'Fasilitasi | Create Events',
        ]);
    }
}
