@extends('layouts.template')

@section('content')
<div class="container mx-auto mt-8 px-4">
    
    <div class="mb-6">
        <a href="{{ route('admin.matakuliah') }}" class="text-slate-600 hover:text-slate-900 flex items-center transition">
            &larr; Kembali ke Daftar Mata Kuliah
        </a>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-slate-200 max-w-2xl">
        <div class="bg-primary-950 border-b border-slate-200 px-6 py-4">
            <h2 class="text-lg font-semibold text-white">Detail Data Mata Kuliah</h2>
        </div>
        
        <div class="p-6 space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                <span class="text-sm font-medium text-slate-500">Kode Mata Kuliag</span>
                <span class="sm:col-span-2 text-slate-900">{{ $detailMatakuliah->kode_matakuliah }}</span>
            </div>
            
            <hr class="border-slate-100">

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                <span class="text-sm font-medium text-slate-500">Nama Mata Kuliah</span>
                <span class="sm:col-span-2 text-slate-900">{{ $detailMatakuliah-> nama_matakuliah}}</span>
            </div>

            <hr class="border-slate-100">

            <div class="grid grid-cols-1 sm:grid-cols-3 gap-2">
                <span class="text-sm font-medium text-slate-500">SKS</span>
                <span class="sm:col-span-2 text-slate-900 font-medium">{{ $detailMatakuliah->sks }}</span>
            </div>
        </div>

        <div class="bg-slate-50 px-6 py-4 flex justify-end">
            <a href="{{ route('admin.edit-matakuliah', ['kode_matakuliah' => $detailMatakuliah->kode_matakuliah]) }}" class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded-md transition">
                Edit Data
            </a>
        </div>
    </div>
</div>
@endsection
