<div class="flex flex-col items-center sm:flex-row gap-4 pb-5 mb-5 border-b border-gray-100 px-2">
    <div class="relative shrink-0">
        @if(auth()->user()->avatar)
            <!-- Ukuran mini w-12 h-12 -->
            <img class="w-12 h-12 rounded-full object-cover border-2 border-blue-500 shadow-sm" 
                 src="{{ asset('storage/' . auth()->user()->avatar) }}" 
                 alt="{{ auth()->user()->name }}">
        @else
            <!-- Lingkaran default mini -->
            <div class="w-12 h-12 rounded-full border-2 border-blue-500 shadow-sm bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-base font-bold uppercase tracking-wider">
                {{ substr(auth()->user()->name ?? 'U', 0, 2) }}
            </div>
        @endif
    </div>
    <div class="text-center sm:text-left">
        <h4 class="text-base font-bold text-gray-800 leading-tight">{{ auth()->user()->name }}</h4>
        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider mt-0.5">Anggota Aktif</p>
    </div>
</div>