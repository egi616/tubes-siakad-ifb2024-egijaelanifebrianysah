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
    public function show(string $npm)
    {
        //
        $detailMahasiswa = Mahasiswa :: findOrFail($npm);

        return view('pages.mahasiswa.detail-mahasiswa', compact('detailMahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $npm)
    {
        //
        $detailMahasiswa = Mahasiswa::findOrFail($npm);
        $dataDosen = Dosen::all();
        return view('pages.mahasiswa.form-mahasiswa', compact('detailMahasiswa', 'dataDosen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $npm)
    {
        //
        $validate = $request->validate(
            [
                'npm'=>'required|min:10|unique:mahasiswa,npm,' . $npm . ',npm',
                'nidn'=>'required|min:10',
                'nama'=>'required|min:1',
            ],

            //custom validasi
            [
                'npm.required' => 'npm tidak boleh di kosongkan',
                'npm.min' => 'npm terlalu pendek, minimal 10 karakter',
                'npm.unique' => 'npm sudah terdaftar',
                'nidn.required' => 'nidn tidak boleh di kosongkan',
                'nidn.min' => 'nidn terlalu pendek, minimal 10 karakter',
                'nama.required' => 'nama tidak boleh di kosongkan',
                'nama.min' => 'nidn terlalu pendek, minimal 1 karakter',
            ]
        );

        Mahasiswa::where('npm', $npm)->update($validate);
        return redirect()->route('mahasiswa')->with('success','Data Mahasiswa berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $npm)
    {
        //
        $dataMahasiswa = Mahasiswa::findOrFail($npm);
        $dataMahasiswa->delete();

        return redirect()->route('mahasiswa')->with('succes', 'Data mahasiswa berhasil di hapus');
    }
}
