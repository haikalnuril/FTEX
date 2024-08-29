<?php

namespace App\Exports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class ExportAyam implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        $reports = Record::orderby('date', 'asc')->get();
        $report1 = $reports->skip(1);
        return view('dashboard.table', compact('reports', 'report1'));
    }
}
