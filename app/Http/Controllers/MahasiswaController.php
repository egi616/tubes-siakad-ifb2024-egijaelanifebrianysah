<?php

namespace App\Http\Controllers;
use App\Models\Mahasiswa;
use App\Models\Dosen;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataMahasiswa = Mahasiswa::with('dosen')->get();
        
        return view('pages.mahasiswa.daftar-mahasiswa', compact('dataMahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dataDosen = Dosen::all();

        return view('pages.mahasiswa.form-mahasiswa', compact('dataDosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'npm'=>'required|min:10|unique:mahasiswa,npm',
            'nidn'=>'required|min:10',
            'nama'=>'required|min:1',
        ]);

        Mahasiswa::create($validate);
        return redirect()->route('mahasiswa');
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
