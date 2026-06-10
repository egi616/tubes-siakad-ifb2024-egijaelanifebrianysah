@extends('layouts.template')

@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Form Mahasiswa</h2>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4 text-lg font-semibold text-slate-800">
            {{ isset($detailMahasiswa) ? 'Edit' : 'Tambah' }} Data Mahasiswa
        </div>

        <form method="POST" action="{{ isset($detailMahasiswa) ? route('admin.update-mahasiswa', ['npm'=>$detailMahasiswa->npm]) : route('admin.store-mahasiswa') }}">
            @csrf
            @if (isset($detailMahasiswa))
                @method('put')
            @endif 

            <div class="mb-4">
                <x-input-label for="npm" value="NPM" />
                <x-text-input id="npm" name="npm" type="text" class="mt-1" value="{{ old('npm', $detailMahasiswa->npm ?? '') }}" />
                @error('npm')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-input-label for="nidn" value="Dosen Pembimbing" />
                <select name="nidn" id="nidn" class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                    <option value="">-- Pilih Dosen --</option>
                    @foreach ($dataDosen as $dosen)
                        <option value="{{ $dosen->nidn }}" {{ old('nidn', $detailMahasiswa->nidn ?? '') == $dosen->nidn ? 'selected' : '' }}>
                            {{ $dosen->nidn }} - {{ $dosen->nama }}
                        </option>
                    @endforeach
                </select>
                @error('nidn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-input-label for="nama" value="Nama" />
                <x-text-input id="nama" name="nama" type="text" class="mt-1" value="{{ old('nama', $detailMahasiswa->nama ?? '') }}" />
                @error('nama')
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