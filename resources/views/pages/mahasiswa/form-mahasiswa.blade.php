@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
    <div class = "container mt-2">
        <h2>Form Mahasiswa</h2>
        <div class= "card">
            <div class="card-header">Tambah Mahasiswa</div>
            <div class="card-body">
                <form action="{{route('store-mahasiswa')}}" method="POST">
                    {{-- dibutuhkan laravel untuk mengirim data --}}
                    @csrf 
                    <div class="mb-3">
                        <label class="form-label">Npm</label>
                        <input name="npm" type="text" class="form-control">
                        @error('npm')
                            <div class="form-text">{{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dosen Pembimbing (nidn dari dosen)</label>
                        <select name="nidn" class="form-control">
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
                        <input name="nama" type="text" class="form-control">
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
