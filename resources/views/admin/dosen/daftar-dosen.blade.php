@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
    <div class = "container mt-2">
        <h2 class="text-xl">Halaman Manajemen Dosen</h2>
        <div class= "card p-3">
            <div class= 'mb2'>
                <a href="{{route('admin.form-create-dosen')}}" class="btn btn-primary btn-sm"> Tambah data </a>
            </div>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nidn</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataDosen as $item)
                        <tr>
                        <th scope="row" class="text-center">{{$loop->iteration}}</th>
                        <td>{{$item->nidn}}</td>
                        <td>{{$item->nama}}</td>
                        <td class="text-center">
                            <form action="{{route ('admin.delete-dosen', ['nidn'=>$item->nidn])}}" method="POST" onsubmit="return confirm ('Apakah anda yakin akan menghapus data dosen ini?')"> 
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            <a href="{{route ('admin.edit-dosen', ['nidn'=>$item->nidn])}}" class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{route ('admin.detail-dosen', ['nidn'=>$item->nidn])}}" class="btn btn-info btn-sm">Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
