<?php

namespace App\Http\Controllers;

use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        $last = Record::latest()->first();
        return view('dashboard.create', compact('last'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'umur' => 'required|numeric',
            'populasi' => 'required|numeric',
            'mati' => 'required|numeric',
            'afkir' => 'required|numeric',
            'pakan' => 'required|numeric',
            'produksi' => 'required|numeric',
            'berat' => 'required|numeric',
            'butir' => 'required|numeric',
            'retakKg' => 'required|numeric',
            'keterangan' => '',
        ], [
            'date.required' => 'Tanggal harus diisi.',
            'date.date' => 'Format tanggal tidak valid.',
            'umur.required' => 'Umur harus diisi.',
            'umur.numeric' => 'Umur harus berupa angka.',
            'populasi.required' => 'Populasi harus diisi.',
            'populasi.numeric' => 'Populasi harus berupa angka.',
            'mati.required' => 'Jumlah mati harus diisi.',
            'mati.numeric' => 'Jumlah mati harus berupa angka.',
            'afkir.required' => 'Jumlah afkir harus diisi.',
            'afkir.numeric' => 'Jumlah afkir harus berupa angka.',
            'pakan.required' => 'Jumlah pakan harus diisi.',
            'pakan.numeric' => 'Jumlah pakan harus berupa angka.',
            'produksi.required' => 'Jumlah produksi harus diisi.',
            'produksi.numeric' => 'Jumlah produksi harus berupa angka.',
            'berat.required' => 'Berat harus diisi.',
            'berat.numeric' => 'Berat harus berupa angka.',
            'butir.required' => 'Jumlah butir harus diisi.',
            'butir.numeric' => 'Jumlah butir harus berupa angka.',
            'retakKg.required' => 'Jumlah retak harus diisi.',
            'retakKg.numeric' => 'Jumlah retak harus berupa angka.',
        ]);

        Record::create($validated);

        return redirect('/dashboard')->with('success', 'Data berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $Record = Record::findOrFail($id);

        $Record->delete();

        return redirect()->route('dashboard');
    }
}
