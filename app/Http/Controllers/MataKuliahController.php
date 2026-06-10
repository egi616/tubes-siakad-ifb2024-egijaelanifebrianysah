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
        $dataMatakuliah = MataKuliah::paginate(6);

        return view('admin.matakuliah.daftar-matakuliah', compact('dataMatakuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.matakuliah.form-matakuliah');
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
    public function show(string $kode_matakuliah)
    {
        //
        $detailMatakuliah = MataKuliah :: findOrFail($kode_matakuliah);

        return view('admin.matakuliah.detail-matakuliah', compact('detailMatakuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $kode_matakuliah)
    {
        //
        $detailMatakuliah = MataKuliah::findOrFail($kode_matakuliah);
        return view('admin.matakuliah.form-matakuliah', compact('detailMatakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $kode_matakuliah)
    {
        //
        $validate = $request->validate(
            [
                'kode_matakuliah'=>'required|min:1|unique:matakuliah,kode_matakuliah,' . $kode_matakuliah . ',kode_matakuliah',
                'nama_matakuliah'=>'required|min:1',
                'sks'=>'required|min:1',
            ],

            //custom validasi
            [
                'kode_matakuliah.required' => 'kode mata kuliah tidak boleh di kosongkan',
                'kode_matakuliah.unique' => 'kode mata kuliah sudah terdaftar',
                'nama_matakuliah.required' => 'nama mata kuliah tidak boleh di kosongkan',
                'sks.required' => 'sks tidak boleh di kosongkan',
            ]
        );

        
        MataKuliah::where('kode_matakuliah', $kode_matakuliah)->update($validate);
        return redirect()->route('admin.matakuliah')->with('success','Data Mahasiswa berhasil di rubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $kode_matakuliah)
    {
        //
        $dataMatakuliah = MataKuliah::findOrFail($kode_matakuliah);
        $dataMatakuliah->delete();

        return redirect()->route('admin.matakuliah')->with('succes', 'Data matakuliah berhasil di hapus');
    }
}
