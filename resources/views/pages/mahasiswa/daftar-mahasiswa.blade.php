@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
    <div class = "container mt-2">
        <h2>Halaman Manajemen Mahasiswa</h2>
        <div class= "card p-3">
            <div class= 'mb2'>
                <a href="{{route('form-create-mahasiswa')}}" class="btn btn-primary btn-sm"> Tambah data </a>
            </div>

            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Npm</th>
                        <th scope="col">Nidn</th>
                        <th scope="col">Nama</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataMahasiswa as $item)
                        <tr>
                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                        <td>{{$item->npm}}</td>
                        <td>{{$item->nidn}}</td>
                        <td>{{$item->nama}}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm">Hapus</button>
                            <button type="button" class="btn btn-warning btn-sm">Edit</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
