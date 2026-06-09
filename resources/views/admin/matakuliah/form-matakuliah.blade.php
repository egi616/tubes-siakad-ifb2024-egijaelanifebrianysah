@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
    <div class = "container mt-2">
        <h2>Form Mata Kuliah</h2>
        <div class= "card">
            <div class="card-header">Tambah Mata Kuliah</div>
            <div class="card-body">
                <form action="{{route('store-matakuliah')}}" method="POST">
                    {{-- dibutuhkan laravel untuk mengirim data --}}
                    @csrf 
                    <div class="mb-3">
                        <label class="form-label">Kode Mata Kuliah</label>
                        <input name="kode_matakuliah" type="text" class="form-control">
                        @error('kode_matakuliah')
                            <div class="form-text">{{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Mata Kuliah</label>
                        <input name="nama_matakuliah" type="text" class="form-control">
                        @error('nama_matakuliah')
                            <div class="form-text">{{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sks</label>
                        <input name="sks" type="text" class="form-control">
                        @error('sks')
                            <div class="form-text">{{$message}} </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
