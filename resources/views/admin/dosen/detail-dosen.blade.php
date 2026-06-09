@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
    <div class = "container mt-2">
        <h2>Detail Data Dosen</h2>
        <div class= "card">
            <div class="card-header">Detail data Dosen</div>
            <div class="card-body">
                <p>NIDN : {{$detailDosen->nidn}}</p>
                <p>Nama : {{$detailDosen->nama}}</p>
            </div>
        </div>
    </div>
@endsection