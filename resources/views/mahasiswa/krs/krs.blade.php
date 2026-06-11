@extends('layouts.template')

@section('content')
<div class="container mx-auto mt-6 px-4">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <h2 class="text-2xl font-bold text-slate-800 flex items-center gap-2">
            Kartu Rencana Studi (KRS)
        </h2>
    </div>

    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex justify-between items-center shadow-sm">
            <div>{{ session('success') }}</div>
            <button type="button" onclick="this.parentElement.style.display='none'" class="text-green-700 hover:text-green-900 font-bold">&times;</button>
        </div>
    @endif
    
    @if($errors->any())
        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg shadow-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <div class="lg:col-span-1 flex flex-col gap-6">
            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="mb-4 text-lg font-semibold text-slate-800 border-b border-slate-100 pb-3 flex items-center gap-2">
                    <i class="bi bi-plus-circle text-blue-600"></i> Tambah Mata Kuliah
                </div>
                
                <form action="{{ route('mahasiswa.krs-store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-4">
                        <x-input-label for="kode_matakuliah" value="Pilih Mata Kuliah" />
                        <select name="kode_matakuliah" id="kode_matakuliah" required
                                class="w-full mt-1 px-4 py-2.5 rounded-lg border border-slate-300 bg-white text-slate-900 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition-colors">
                            <option value="">-- Pilih Matkul --</option>
                            @if(isset($dataMatakuliah))
                                @forelse($dataMatakuliah as $mk)
                                    <option value="{{ $mk->kode_matakuliah }}">
                                        {{ $mk->kode_matakuliah }} - {{ $mk->nama_matakuliah }} ({{ $mk->sks }} SKS)
                                    </option>
                                @empty
                                    <option disabled>Data mata kuliah belum tersedia</option>
                                @endforelse
                            @endif
                        </select>
                        @error('kode_matakuliah')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mt-6 flex justify-center">
                        <x-primary-button class="w-full justify-center py-3">
                            <i class="bi bi-plus mr-2"></i> Ambil Mata Kuliah
                        </x-primary-button>
                    </div>
                </form>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md border-t-4 border-t-primary-950 text-center">
                <h6 class="text-sm font-medium text-slate-500 uppercase tracking-wider mb-2">Total SKS Diambil</h6>
                <h2 class="text-4xl font-bold text-primary-950">{{ $totalSks ?? 0 }} <span class="text-xl text-primary-950">SKS</span></h2>
            </div>
        </div>

        <div class="lg:col-span-2">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="bg-slate-800 px-6 py-4">
                    <h3 class="text-white font-semibold text-lg">
                        KRS Aktif 
                        @if(isset($detailMahasiswa))
                            — {{ $detailMahasiswa->nama }} <span class="text-slate-300 text-sm font-normal">({{ $detailMahasiswa->npm }})</span>
                        @endif
                    </h3>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead class="bg-slate-50 text-slate-600 text-sm uppercase font-semibold">
                            <tr>
                                <th class="px-6 py-4 border-b border-slate-200 w-12 text-center">#</th>
                                <th class="px-6 py-4 border-b border-slate-200">Kode</th>
                                <th class="px-6 py-4 border-b border-slate-200">Nama Mata Kuliah</th>
                                <th class="px-6 py-4 border-b border-slate-200 text-center">SKS</th>
                                <th class="px-6 py-4 border-b border-slate-200 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-slate-700">
                            @if(isset($dataKrs))
                                @forelse($dataKrs as $k)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="px-6 py-4 text-center text-slate-500">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">
                                        <span class="font-mono text-sm bg-slate-100 text-slate-700 px-2 py-1 rounded">
                                            {{ $k->kode_matakuliah }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-slate-900">
                                        {{ $k->matakuliah->nama_matakuliah ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center font-semibold">
                                        {{ $k->matakuliah->sks ?? '-' }}
                                    </td>
                                    <td class="px-6 py-4 text-center">
                                        <form action="{{ route('mahasiswa.delete-krs', $k->id ?? '') }}" 
                                              method="POST" 
                                              onsubmit="return confirm('Drop mata kuliah ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <x-red-button>
                                                Drop
                                            </x-red-button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <p class="text-slate-500 font-medium">Belum ada mata kuliah yang diambil.</p>
                                    </td>
                                </tr>
                                @endforelse
                            @endif
                        </tbody>
                        
                        @if(isset($dataKrs) && $dataKrs->isNotEmpty())
                        <tfoot class="bg-slate-50 border-t-2 border-slate-200 font-bold text-slate-800">
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-right uppercase text-sm">Total SKS</td>
                                <td class="px-6 py-4 text-center text-lg text-primary-950">{{ $totalSks ?? 0 }}</td>
                                <td>   
                                    <x-primary-button href="{{ route('mahasiswa.export-pdf') }}">      
                                        Cetak KRS
                                    </x-primary-button>
                                </td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection