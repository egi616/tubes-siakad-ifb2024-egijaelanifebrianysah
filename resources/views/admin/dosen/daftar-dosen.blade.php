@extends('layouts.template')
{{-- untuk memanggil content --}}
@section('content')
<div class="container mx-auto mt-6">
    <h2 class="text-2xl font-bold mb-4">Halaman Manajemen Dosen</h2>
    
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="mb-4">
            <x-primary-button href="{{route('admin.form-create-dosen')}}">
                Tambah Data
            </x-primary-button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-primary-950">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIDN</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-primary-950">
                    @foreach ($dataDosen as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$loop->iteration}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$item->nidn}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{$item->nama}}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm flex justify-center gap-2">
                                <x-edit-button href="{{route('admin.edit-dosen', ['nidn'=>$item->nidn])}}">
                                    Edit
                                </x-edit-button>
                                <x-detail-button href="{{route('admin.detail-dosen', ['nidn'=>$item->nidn])}}">
                                    Detail
                                </x-detail-button>
                                <form action="{{route('admin.delete-dosen', ['nidn'=>$item->nidn])}}" method="POST" onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')"> 
                                    @csrf
                                    @method('DELETE')
                                    <x-red-button>
                                        Hapus
                                    </x-red-button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mt-4">
                {{ $dataDosen->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
