@extends('layouts.template')

@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Form Mata Kuliah</h2>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4 text-lg font-semibold text-slate-800">
            {{ isset($detailMatakuliah) ? 'Edit' : 'Tambah' }} Data Mata Kuliah
        </div>


        <form method="POST" action="{{ isset($detailMatakuliah) ? route('admin.update-matakuliah', ['kode_matakuliah'=>$detailMatakuliah->kode_matakuliah]) : route('admin.store-matakuliah') }}">
            @csrf
            @if (isset($detailMatakuliah))
                @method('put')
            @endif 


            <div class="mb-4">
                <x-input-label for="kode_matakuliah" value="Kode Mata Kuliah" />
                <x-text-input id="kode_matakuliah" name="kode_matakuliah" type="text" class="mt-1" value="{{ old('kode_matakuliah', $detailMatakuliah->kode_matakuliah ?? '') }}" />
                @error('kode_matakuliah')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-input-label for="nama_matakuliah" value="Nama Mata Kuliah" />
                <x-text-input id="nama_matakuliah" name="nama_matakuliah" type="text" class="mt-1" value="{{ old('nama_matakuliah', $detailMatakuliah->nama_matakuliah ?? '') }}" />
                @error('nama_matakuliah')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-input-label for="sks" value="SKS" />
                <x-text-input id="sks" name="sks" type="number" class="mt-1" value="{{ old('sks', $detailMatakuliah->sks ?? '') }}" />
                @error('sks')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-center">
                <x-primary-button>
                    Submit
                </x-primary-button>
            </div>
        </form>
    </div>
</div>
@endsection