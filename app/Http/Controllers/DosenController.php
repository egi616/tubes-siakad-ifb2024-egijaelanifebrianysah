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

        return view('admin.dosen.daftar-dosen', compact('dataDosen'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.dosen.form-dosen');
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

        return view('admin.dosen.detail-dosen', compact('detailDosen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $nidn)
    {
        //
        $detailDosen = Dosen::findOrFail($nidn);
        return view('admin.dosen.form-dosen', compact('detailDosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nidn)
    {
        //
        $validate = $request->validate(
            [
                'nidn'=>'required|min:10|unique:dosen,nidn,' . $nidn . ',nidn',
                'nama'=>'required|min:5',
            ],

            //custom validasi
            [
                'nidn.required' => 'nidn tidak boleh di kosongkan',
                'nidn.min' => 'nidn terlalu pendek, minimal 10 karakter',
                'nidn.unique' => 'NIDN sudah terdaftar',
                'nama.required' => 'nama tidak boleh di kosongkan',
                'nama.min' => 'nidn terlalu pendek, minimal 5 karakter',
            ]
        );

        Dosen::where('nidn', $nidn)->update($validate);
        return redirect()->route('dosen')->with('success','Data dosen berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nidn)
    {
        //
        $dataDosen = Dosen::findOrFail($nidn);
        $dataDosen->delete();

        return redirect()->route('dosen')->with('succes', 'Data dosen berhasil di hapus');
    }
}
