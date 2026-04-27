<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataMataKuliah = MataKuliah::all();

        return view('pages.matakuliah.daftar-matakuliah', compact('dataMataKuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.matakuliah.form-matakuliah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'kode_matakuliah'=>'required|min:8|unique:matakuliah,kode_matakuliah',
            'nama_matakuliah'=>'required|min:5',
            'sks'=>'required|numeric',
        ]);

        MataKuliah::create($validate);
        return redirect()->route('matakuliah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
