<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataDosen = Dosen::all();

        return view('pages.dosen.daftar-dosen', compact('dataDosen'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('pages.dosen.form-dosen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'nidn'=>'required|min:10|unique:dosen,nidn',
            'nama'=>'required|min:5',
        ]);

        Dosen::create($validate);
        return redirect()->route('dosen');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nidn)
    {
        //
        $detailDosen = Dosen :: findOrFail($nidn);

        return view('pages.dosen.detail-dosen', compact('detailDosen'));
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
