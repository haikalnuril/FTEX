<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Record;

class DashboardController extends Controller
{
    public function index()
    {
        $reports = Record::all();
        $report1 = $reports->skip(1);
        return view('dashboard.index', compact('reports', 'report1'));
    }
}
