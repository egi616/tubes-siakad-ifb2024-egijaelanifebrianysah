@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
    <div class = "container mt-2">
        <h2>Detail Data Mahasiswa</h2>
        <div class= "card">
            <div class="card-header">Detail data Mahasiswa</div>
            <div class="card-body">
                <p>NPM : {{$detailMahasiswa->npm}}</p>
                <p>NIDN : {{$detailMahasiswa->nidn}}</p>
                <p>Nama : {{$detailMahasiswa->nama}}</p>
            </div>
        </div>
    </div>
@endsection