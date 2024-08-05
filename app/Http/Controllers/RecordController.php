<?php

namespace App\Http\Controllers;

use App\Models\Record;
use App\Http\Requests\StoreRecordRequest;
use App\Http\Requests\UpdateRecordRequest;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function destroy($id)
    {
        $Record = Record::findOrFail($id);

        $Record->delete();

        return redirect()->route('dashboard');
    }
}
