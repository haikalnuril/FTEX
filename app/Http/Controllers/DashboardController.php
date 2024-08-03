<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class DashboardController extends Controller
{
    public function index()
    {
        $reports = Record::latest()->get();
        return view('dashboard.index', compact('reports'));
    }
}
