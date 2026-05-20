@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
    <div class = "container mt-2">
        <h2>Form Mahasiswa</h2>
        <div class= "card">
            <div class="card-header">{{isset($detailMahasiswa)? 'Edit' : 'Tambah'}} data Mahasiswa</div>
            <div class="card-body">
                <form method="POST" action="{{ isset($detailMahasiswa) ? 
                route('update-mahasiswa', ['npm'=>$detailMahasiswa->npm]) :
                route('store-mahasiswa')}}">
                    {{-- dibutuhkan laravel untuk mengirim data --}}
                    @csrf
                    @if (isset($detailMahasiswa))
                        @method('put')
                    @endif 
                    <div class="mb-3">
                        <label class="form-label">Npm</label>
                        <input name="npm" type="text" class="form-control" value="{{old('npm', $detailMahasiswa->npm ?? '')}}">
                        @error('npm')
                            <div class="form-text">{{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dosen Pembimbing (nidn dari dosen)</label>
                        <select name="nidn" class="form-control" value="{{old('nidn', $detailMahasiswa->nidn ?? '')}}">
                            <option value="">-- Pilih Dosen --</option>
                            @foreach ($dataDosen as $dosen)
                                <option value="{{ $dosen->nidn }}">
                                    {{ $dosen->nidn }} - {{ $dosen->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('nidn')
                            <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div> 
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input name="nama" type="text" class="form-control" value="{{old('nama', $detailMahasiswa->nama ?? '')}}">
                        @error('nama')
                            <div class="form-text">{{$message}} </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
