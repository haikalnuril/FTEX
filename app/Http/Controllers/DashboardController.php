<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Exports\ExportAyam;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DashboardController extends Controller
{
    public function index()
    {
        $reports = Record::orderby('date', 'asc')->get();
        $report1 = $reports->skip(1);
        return view('dashboard.index', compact('reports', 'report1'));
    }

    public function view(){
        $reports = Record::orderby('date', 'asc')->get();
        $report1 = $reports->skip(1);
        return view('dashboard.table', compact('reports', 'report1'));
    }

    public function export(){
        return Excel::download(new ExportAyam, 'report.xlsx');
    }
}
