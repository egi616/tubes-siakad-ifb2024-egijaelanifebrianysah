@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
    <div class = "container mt-2">
        <h2>Form Dosen</h2>
        <div class= "card">
            <div class="card-header">Tambah Dosen</div>
            <div class="card-body">
                <form action="{{route('store-dosen')}}" method="POST">
                    {{-- dibutuhkan laravel untuk mengirim data --}}
                    @csrf 
                    <div class="mb-3">
                        <label class="form-label">Nidn</label>
                        <input name="nidn" type="text" class="form-control">
                        @error('nidn')
                            <div class="form-text">{{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama penulis</label>
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
