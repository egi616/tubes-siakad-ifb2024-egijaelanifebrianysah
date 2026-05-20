@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
    <div class = "container mt-2">
        <h2>Form Dosen</h2>
        <div class= "card">
            <div class="card-header">{{isset($detailDosen)? 'Edit' : 'Tambah'}} data Dosen</div>
            <div class="card-body">
                <form method="POST" action="{{ isset($detailDosen) ? 
                route('update', ['nidn'=>$detailDosen->nidn]) :
                route('store-dosen')}}">
                    {{-- dibutuhkan laravel untuk mengirim data --}}
                    @csrf
                    @if (isset($detailDosen))
                        @method('put')
                    @endif 

                    <div class="mb-3">
                        <label class="form-label">Nidn</label>
                        <input name="nidn" type="text" class="form-control" value="{{old('nidn', $detailDosen->nidn ?? '')}}">
                        @error('nidn')
                            <div class="form-text">{{$message}} </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input name="nama" type="text" class="form-control" value="{{old('nama', $detailDosen->nama ?? '')}}">
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
