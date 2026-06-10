@extends('layouts.template')

@section('content')
    <div class="container mx-auto mt-6">
        <h2 class="text-2xl font-bold mb-4">Form Dosen</h2>
        
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="mb-4 text-lg font-semibold text-slate-800">
                {{ isset($detailDosen) ? 'Edit' : 'Tambah' }} Data Dosen
            </div>

            <form method="POST" action="{{ isset($detailDosen) ? route('admin.update-dosen', ['nidn'=>$detailDosen->nidn]) : route('admin.store-dosen') }}">
                @csrf
                @if (isset($detailDosen))
                    @method('put')
                @endif 

                <div class="mb-4">
                    <x-input-label for="nidn" value="NIDN" />
                    <x-text-input id="nidn" name="nidn" type="text" class="mt-1" value="{{ old('nidn', $detailDosen->nidn ?? '') }}" />
                    @error('nidn')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <x-input-label for="nama" value="Nama" />
                    <x-text-input id="nama" name="nama" type="text" class="mt-1" value="{{ old('nama', $detailDosen->nama ?? '') }}" />
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
