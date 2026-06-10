<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Dosen;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $dataJadwal = Jadwal::with('matakuliah', 'dosen')->paginate(6);
        
        return view('admin.jadwal.daftar-jadwal', compact('dataJadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $dataJadwal = Jadwal::all();
        $dataDosen = Dosen::all();
        $dataMatakuliah = MataKuliah::all();

        return view('admin.jadwal.form-jadwal', compact('dataJadwal', 'dataMatakuliah','dataDosen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
            'nidn'            => 'required|exists:dosen,nidn',
            'kelas'           => 'required|string|size:1',
            'hari'            => 'required|string|max:10',
            'jam'             => 'required|date_format:H:i',
        ]);

        Jadwal::create($request->all());
        return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $detailJadwal = Jadwal :: findOrFail($id);

        return view('admin.jadwal.detail-jadwal', compact('detailJadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $detailJadwal = Jadwal::findOrFail($id);
        $dataMatakuliah = MataKuliah::all();
        $dataDosen = Dosen::all();
        return view('admin.jadwal.form-jadwal', compact('detailJadwal', 'dataDosen','dataMatakuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate([
            'kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah',
            'nidn'            => 'required|exists:dosen,nidn',
            'kelas'           => 'required|string|size:1',
            'hari'            => 'required|string|max:10',
            'jam'             => 'required|date_format:H:i',
        ]);

        $validate['jam'] = date('Y-m-d') . ' ' . $validate['jam'] . ':00';

        Jadwal::where('id',$id)->update($validate);
        return redirect()->route('admin.jadwal')->with('success', 'Jadwal berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dataJadwal = Jadwal::findOrFail($id);
        $dataJadwal->delete();

        return redirect()->route('admin.jadwal')->with('succes', 'Data jadwal berhasil di hapus');
    }
}
