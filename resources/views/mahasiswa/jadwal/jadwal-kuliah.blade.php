@extends('layouts.template')

@section('content')
<div class="container mx-auto px-4 py-6 max-w-6xl">
    <h4 class="text-2xl font-bold text-gray-800 mb-6 flex items-center gap-2">
       Jadwal Perkuliahan dari KRS
    </h4>

    @forelse($jadwal as $hari => $items)
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6 overflow-hidden">
            <div class="bg-slate-800 px-5 py-3 border-b border-slate-700">
                <h5 class="text-white font-semibold text-lg flex items-center gap-2">
                    {{ strtoupper($hari) }}
                </h5>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gray-50 text-gray-600 text-sm uppercase font-semibold">
                        <tr>
                            <th class="px-5 py-3 border-b border-gray-200 whitespace-nowrap">Jam</th>
                            <th class="px-5 py-3 border-b border-gray-200">Mata Kuliah</th>
                            <th class="px-5 py-3 border-b border-gray-200">Kelas</th>
                            <th class="px-5 py-3 border-b border-gray-200">Dosen</th>
                            <th class="px-5 py-3 border-b border-gray-200 text-center">SKS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-700">
                        @foreach($items as $j)
                        <tr class="hover:bg-blue-50/50 transition-colors duration-150">
                            <td class="px-5 py-4 whitespace-nowrap font-medium text-gray-900">
                                {{ \Carbon\Carbon::parse($j->jam)->format('H:i') }}
                            </td>
                            <td class="px-5 py-4">
                                <div class="font-semibold text-gray-900">{{ $j->matakuliah->nama_matakuliah ?? 'Tidak Diketahui' }}</div>
                                <div class="text-xs text-gray-500 mt-0.5">{{ $j->kode_matakuliah }}</div>
                            </td>
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center justify-center px-2.5 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-md">
                                    {{ $j->kelas }}
                                </span>
                            </td>
                            <td class="px-5 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-xs font-bold">
                                        {{ strtoupper(substr($j->dosen->nama ?? '?', 0, 1)) }}
                                    </div>
                                    <span>{{ $j->dosen->nama ?? '-' }}</span>
                                </div>
                            </td>
                            <td class="px-5 py-4 text-center font-medium">
                                {{ $j->matakuliah->sks ?? '-' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="bg-blue-50 border border-blue-200 text-blue-700 px-4 py-10 rounded-lg text-center shadow-sm">
            <svg class="w-16 h-16 text-blue-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
            </svg>
            <h3 class="font-bold text-xl mb-2 text-slate-800">Anda belum mengambil jadwal di KRS</h3>
            <p class="text-md text-slate-600 mb-6 max-w-md mx-auto">
                Silakan isi Kartu Rencana Studi (KRS) Anda terlebih dahulu. Jadwal perkuliahan akan otomatis muncul berdasarkan mata kuliah yang Anda ambil.
            </p>
            
            <a href="{{ route('mahasiswa.krs') }}" class="inline-flex items-center gap-2 bg-blue-600 text-white font-medium px-6 py-2.5 rounded-lg shadow-sm hover:bg-blue-700 transition-colors">
                <i class="bi bi-journal-plus"></i> Menuju Halaman KRS
            </a>
        </div>
    @endforelse
</div>
@endsection