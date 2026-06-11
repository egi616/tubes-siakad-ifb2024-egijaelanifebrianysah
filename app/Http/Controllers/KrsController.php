<?php

namespace App\Http\Controllers;
use App\Models\Krs;

use Illuminate\Http\Request;
use App\Models\MataKuliah; 
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;

class KrsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $npm = auth()->user()->npm; 
        $dataKrs = Krs::with('matakuliah')->where('npm', $npm)->get();

        $dataMatakuliah = MataKuliah::all();

        $detailMahasiswa = Mahasiswa::where('npm', $npm)->first();

        $totalSks = 0;
        foreach ($dataKrs as $krs) {
            if ($krs->matakuliah) {
                $totalSks += $krs->matakuliah->sks;
            }
        }

        return view('mahasiswa.krs.krs', compact('dataKrs', 'dataMatakuliah', 'detailMahasiswa', 'totalSks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            ['kode_matakuliah' => 'required|exists:matakuliah,kode_matakuliah'],
            ['kode_matakuliah.required' => 'Silakan pilih mata kuliah terlebih dahulu.']
        );

        $npm = auth()->user()->npm;

        $sudahDiambil = Krs::where('npm', $npm)
                        ->where('kode_matakuliah', $request->kode_matakuliah)
                        ->exists();

        if ($sudahDiambil) {
            return redirect()->back()->withErrors(['kode_matakuliah' => 'Mata kuliah ini sudah anda ambil di KRS.']);
        }

        Krs::create([
            'npm' => $npm,
            'kode_matakuliah' => $request->kode_matakuliah,
        ]);

        return redirect()->back()->with('success', 'Mata kuliah berhasil ditambahkan ke KRS.');
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
    
        $krs = Krs::findOrFail($id);

        $npmLogin = auth()->user()->npm;
        if ($krs->npm !== $npmLogin) {
            return redirect()->back()->withErrors(['error' => 'Anda tidak memiliki akses untuk menghapus data ini.']);
        }

        $krs->delete();
        return redirect()->back()->with('success', 'Mata kuliah berhasil di-drop dari KRS.');
    }
    public function exportPdf()
    {
        $npm = auth()->user()->npm;
        $dataKrs = Krs::with('matakuliah')->where('npm', $npm)->get();
        $detailMahasiswa = Mahasiswa::where('npm', $npm)->first();
        
        $totalSks = 0;
        foreach ($dataKrs as $krs) {
            $totalSks += $krs->matakuliah->sks ?? 0;
        }

        $pdf = Pdf::loadView('mahasiswa.krs.pdf', compact('dataKrs', 'detailMahasiswa', 'totalSks'));
        
        return $pdf->download('KRS_' . $npm . '.pdf');
    }
}
