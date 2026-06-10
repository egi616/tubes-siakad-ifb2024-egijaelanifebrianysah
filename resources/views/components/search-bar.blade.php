<form {{ $attributes->merge(['class' => 'w-full']) }} method="GET" action="{{ url()->current() }}">
    <div class="flex w-full shadow-sm rounded-lg">
        <div class="relative flex-grow focus-within:z-10">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                class="block w-full py-2.5 pl-10 border-gray-300 rounded-none rounded-l-lg focus:border-slate-800 focus:ring-slate-800 text-sm" 
                placeholder="Cari data..."
            >
        </div>
        
        <button 
            type="submit" 
            class="relative -ml-px inline-flex items-center border border-slate-800 bg-primary-950 px-5 py-2.5 text-sm font-medium text-white hover:bg-slate-900 focus:outline-none focus:ring-1 focus:ring-slate-800 rounded-none rounded-r-lg transition-colors"
        >
            Cari
        </button>
    </div>
</form>