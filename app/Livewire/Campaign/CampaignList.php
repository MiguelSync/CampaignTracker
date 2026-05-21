<div>
    {{-- Campo de busca --}}
    <div class="px-1 mb-2">
        <input
            type="text"
            wire:model.live.debounce.300ms="title"
            placeholder="Buscar campanha..."
            class="w-full px-2.5 py-1.5 bg-[#e3e5e8] border-0 rounded-md text-[13px] text-[#313338] placeholder-[#87898f] focus:outline-none focus:ring-2 focus:ring-[#5865f2]/40 transition"
        />
    </div>

    {{-- Lista --}}
    @forelse($campaigns as $campaign)
        <a href="{{ route('campaign.show', $campaign->id) }}"
            class="flex items-center gap-2 px-2 py-1.5 rounded-md text-[13px] text-[#4e5058] hover:bg-[#d7d9dc] hover:text-[#060607] transition-colors group truncate">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 shrink-0 text-[#87898f] group-hover:text-[#5865f2] transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8 2a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
            </svg>
            <span class="truncate">{{ $campaign->title }}</span>
        </a>
    @empty
        <p class="px-2 py-2 text-[12px] text-[#87898f]">Nenhuma campanha encontrada.</p>
    @endforelse

    {{-- Paginação discreta --}}
    @if($campaigns->hasPages())
        <div class="mt-2 px-1">
            {{ $campaigns->links() }}
        </div>
    @endif
</div>