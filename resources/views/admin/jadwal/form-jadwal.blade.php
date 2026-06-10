@extends('layouts.template')

@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Form Jadwal</h2>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4 text-lg font-semibold text-slate-800">
            {{ isset($detailJadwal) ? 'Edit' : 'Tambah' }} Data Jadwal
        </div>

        <form method="POST" action="{{ isset($detailJadwal) ? route('admin.update-jadwal', ['id'=>$detailJadwal->id]) : route('admin.store-jadwal') }}">
            @csrf
            @if (isset($detailJadwal))
                @method('put')
            @endif 

            <div class="mb-4">
                <x-input-label for="kode_matakuliah" value="Kode Mata Kuliah" />
                <select name="kode_matakuliah" id="kode_matakuliah" class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                    <option value="">-- Pilih Mata Kuliah --</option>
                    @foreach ($dataMatakuliah as $item)
                        <option value="{{ $item->kode_matakuliah }}" {{ old('kode_matakuliah', $detailJadwal->kode_matakuliah ?? '') == $item->kode_matakuliah ? 'selected' : '' }}>
                            {{ $item->kode_matakuliah }} - {{ $item->nama_matakuliah }}
                        </option>
                    @endforeach
                </select>
                @error('nidn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-input-label for="nidn" value="Dosen Pengampu" />
                <select name="nidn" id="nidn" class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                    <option value="">-- Pilih Dosen --</option>
                    @foreach ($dataDosen as $dosen)
                        <option value="{{ $dosen->nidn }}" {{ old('nidn', $detailJadwal->nidn ?? '') == $dosen->nidn ? 'selected' : '' }}>
                            {{ $dosen->nidn }} - {{ $dosen->nama }}
                        </option>
                    @endforeach
                </select>
                @error('nidn')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-input-label for="kelas" value="Kelas" />
                <x-text-input id="kelas" name="kelas" type="text" class="mt-1" value="{{ old('kelas', $detailJadwal->kelas ?? '') }}" />
                @error('kelas')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-input-label for="hari" value="Hari" />
                <select name="hari" id="hari"
                    class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300">
                    <option value="">-- Pilih Hari --</option>
                    @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $hari)
                        <option value="{{ $hari }}"
                            {{ old('hari', $detailJadwal->hari ?? '') == $hari ? 'selected' : '' }}>
                            {{ $hari }}
                        </option>
                    @endforeach
                </select>
                @error('hari')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <x-input-label for="jam" value="Jam" />
                <input
                    type="time"
                    id="jam"
                    name="jam"
                    value="{{ old('jam', isset($detailJadwal) ? date('H:i', strtotime($detailJadwal->jam)) : '') }}"
                    class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors"
                >
                @error('jam')
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