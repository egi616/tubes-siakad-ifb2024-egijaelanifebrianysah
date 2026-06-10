<aside class="flex h-screen w-64 shrink-0 flex-col bg-indigo-950 text-white shadow-lg">
  <div class="flex h-16 items-center border-b border-white-800 px-6">
    <span class="text-xl font-bold tracking-wider">Siakad</span>
  </div>

  <nav class="flex-1 space-y-2 overflow-y-auto px-4 py-6">
    @if(Auth::check())
        @if(Auth::user()->role === 'admin')
            <a href="{{route('admin.dosen')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-gray-400 transition-colors hover:bg-gray-800 hover:text-white">
              <span class="text-sm font-medium">Manajemen Data Dosen</span>
            </a>

            <a href="{{route('admin.mahasiswa')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-gray-400 transition-colors hover:bg-gray-800 hover:text-white">
                <span class="text-sm font-medium">Manajemen Data Mahasiswa</span>
            </a>

            <a href="{{route('admin.matakuliah')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-gray-400 transition-colors hover:bg-gray-800 hover:text-white">
                <span class="text-sm font-medium">Manajemen Data Mata Kuliah</span>
            </a>

            <a href="{{route('admin.jadwal')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-gray-400 transition-colors hover:bg-gray-800 hover:text-white">
                <span class="text-sm font-medium">Manajemen Data Jadwal</span>
            </a>
        @elseif(Auth::user()->role === 'mahasiswa')
            {{-- <a href="{{route('admin.matakuliah')}}" class="flex items-center gap-3 rounded-lg px-4 py-3 text-gray-400 transition-colors hover:bg-gray-800 hover:text-white">
                <span class="text-sm font-medium">Manajemen Data Mata Kuliah</span>
            </a> --}}
        @endif
    @endif
  </nav>

  <div class="border-t border-white-800 p-4">
    <div class="flex items-center gap-3 px-2">
      <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-500 font-bold text-white">
          {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
      </div>
      <div>
        <p class="text-sm font-medium text-white">{{ auth()->user()->name }}</p>
        <p class="text-xs text-gray-400">{{ auth()->user()->email }}</p>
      </div>
    </div>
  </div>

  <div class="border-t border-white-800 p-4">
    <div class="flex-col gap-3 px-2">
        <div>
          <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
              <x-red-button class="w-full justify-center">
                Keluar
              </x-red-button>
          </form>
        </div>
      </div>
    </div>
  </aside>

