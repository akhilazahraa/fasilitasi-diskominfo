<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IspController extends Controller
{
    public function index()
    {
        return view('dashboard.isp.index', [
            'title' => 'Fasilitasi | ISP',
        ]);
    }
}
