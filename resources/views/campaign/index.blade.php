<x-app-layout>
    <div class="flex h-screen bg-[#f2f3f5] font-sans overflow-hidden">

        {{-- Sidebar --}}
        <aside class="w-64 bg-[#f2f3f5] border-r border-[#e3e5e8] flex flex-col shrink-0">

            <div class="px-4 py-3 border-b border-[#e3e5e8] bg-white flex items-center justify-between">
                <h1 class="text-[14px] font-bold text-[#060607] uppercase tracking-wider">Campanhas</h1>
                <a href="{{ route('campaign.create') }}" title="Nova Campanha"
                    class="w-7 h-7 flex items-center justify-center rounded-md text-[#6d6f78] hover:text-[#5865f2] hover:bg-[#ebedf0] transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </a>
            </div>

            <div class="flex-1 overflow-y-auto py-2 px-2">
                <p class="px-2 mb-1 mt-1 text-[11px] font-semibold uppercase tracking-widest text-[#6d6f78]">Suas campanhas</p>

                @forelse($campaigns as $campaign)
                    <a href="{{ route('campaign.show', $campaign->id) }}"
                        class="flex items-center gap-2 px-2 py-1.5 rounded-md text-[13px] text-[#4e5058] hover:bg-[#d7d9dc] hover:text-[#060607] transition-colors group truncate">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 shrink-0 text-[#87898f] group-hover:text-[#5865f2] transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z" />
                        </svg>
                        <span class="truncate">{{ $campaign->title }}</span>
                    </a>
                @empty
                    <p class="px-2 py-2 text-[12px] text-[#87898f]">Nenhuma campanha ainda.</p>
                @endforelse
            </div>

        </aside>

        {{-- Conteúdo principal --}}
        <main class="flex-1 flex flex-col overflow-hidden">

            <div class="h-12 bg-white border-b border-[#e3e5e8] flex items-center px-5 gap-2 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#6d6f78]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 8.25h13.5M5.25 12h13.5m-13.5 3.75H12" />
                </svg>
                <span class="text-[15px] font-semibold text-[#060607]">Todas as Campanhas</span>
                <div class="ml-auto">
                    <a href="{{ route('campaign.create') }}"
                        class="flex items-center gap-1.5 px-3 py-1.5 bg-[#5865f2] hover:bg-[#4752c4] text-white text-[13px] font-semibold rounded-md transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Nova Campanha
                    </a>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-6">
                <div class="max-w-5xl mx-auto">

                    @php $count = $campaigns->count(); @endphp

                    @if($count === 0)
                        <div class="flex flex-col items-center justify-center py-24 text-center">
                            <div class="w-16 h-16 rounded-full bg-[#ebedef] flex items-center justify-center mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#b5bac1]" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" />
                                </svg>
                            </div>
                            <p class="text-[15px] font-semibold text-[#313338]">Nenhuma campanha ainda</p>
                            <p class="text-[13px] text-[#6d6f78] mt-1">Crie sua primeira campanha para começar.</p>
                            <a href="{{ route('campaign.create') }}" class="mt-4 px-4 py-2 bg-[#5865f2] hover:bg-[#4752c4] text-white text-[13px] font-semibold rounded-md transition-colors">
                                Criar Campanha
                            </a>
                        </div>

                    @elseif($count === 1)
                        @foreach($campaigns as $campaign)
                            <a href="{{ route('campaign.show', $campaign->id) }}"
                                class="flex bg-white rounded-xl border border-[#e3e5e8] hover:border-[#5865f2] hover:shadow-md transition-all duration-150 group overflow-hidden w-full">
                                <div class="w-2 bg-[#5865f2] shrink-0"></div>
                                <div class="flex flex-1 items-center gap-6 px-6 py-5">
                                    <div class="flex-1 min-w-0">
                                        <h3 class="text-[17px] font-semibold text-[#060607] group-hover:text-[#5865f2] transition-colors truncate">{{ $campaign->title }}</h3>
                                        @if($campaign->description)
                                            <p class="text-[13px] text-[#6d6f78] mt-1 truncate">{{ $campaign->description }}</p>
                                        @endif
                                    </div>
                                    <div class="flex items-center gap-4 shrink-0">
                                        @if($campaign->started_at)
                                            <span class="text-[12px] text-[#6d6f78]">{{ \Carbon\Carbon::parse($campaign->started_at)->format('d/m/Y') }}</span>
                                        @endif
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-[#e8f5e9] text-[#2e7d32] text-[11px] font-semibold">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#43a047] inline-block"></span>
                                            Ativa
                                        </span>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#b5bac1] group-hover:text-[#5865f2] transition-colors" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        @endforeach

                    @elseif($count === 2)
                        <div class="grid grid-cols-2 gap-4">
                            @foreach($campaigns as $campaign)
                                <a href="{{ route('campaign.show', $campaign->id) }}"
                                    class="flex flex-col bg-white rounded-xl border border-[#e3e5e8] hover:border-[#5865f2] hover:shadow-md transition-all duration-150 group overflow-hidden">
                                    <div class="h-1.5 bg-[#5865f2]"></div>
                                    <div class="p-5 flex-1 flex flex-col">
                                        <h3 class="text-[15px] font-semibold text-[#060607] group-hover:text-[#5865f2] transition-colors truncate">{{ $campaign->title }}</h3>
                                        @if($campaign->description)
                                            <p class="text-[13px] text-[#6d6f78] mt-1.5 line-clamp-2 flex-1">{{ $campaign->description }}</p>
                                        @endif
                                        <div class="flex items-center justify-between mt-4 pt-3 border-t border-[#f2f3f5]">
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#e8f5e9] text-[#2e7d32] text-[11px] font-semibold">
                                                <span class="w-1.5 h-1.5 rounded-full bg-[#43a047] inline-block"></span>
                                                Ativa
                                            </span>
                                            @if($campaign->started_at)
                                                <span class="text-[11px] text-[#b5bac1]">{{ \Carbon\Carbon::parse($campaign->started_at)->format('d/m/Y') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>

                    @else
                        <div class="grid grid-cols-3 gap-4">
                            @foreach($campaigns as $campaign)
                                <a href="{{ route('campaign.show', $campaign->id) }}"
                                    class="flex flex-col bg-white rounded-xl border border-[#e3e5e8] hover:border-[#5865f2] hover:shadow-md transition-all duration-150 group overflow-hidden">
                                    <div class="h-1.5 bg-[#5865f2]"></div>
                                    <div class="p-4 flex-1 flex flex-col">
                                        <h3 class="text-[14px] font-semibold text-[#060607] group-hover:text-[#5865f2] transition-colors truncate">{{ $campaign->title }}</h3>
                                        @if($campaign->description)
                                            <p class="text-[12px] text-[#6d6f78] mt-1 line-clamp-2 flex-1">{{ $campaign->description }}</p>
                                        @endif
                                        <div class="flex items-center justify-between mt-3 pt-3 border-t border-[#f2f3f5]">
                                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-[#e8f5e9] text-[#2e7d32] text-[11px] font-semibold">
                                                <span class="w-1.5 h-1.5 rounded-full bg-[#43a047] inline-block"></span>
                                                Ativa
                                            </span>
                                            @if($campaign->started_at)
                                                <span class="text-[11px] text-[#b5bac1]">{{ \Carbon\Carbon::parse($campaign->started_at)->format('d/m/Y') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </main>
    </div>
</x-app-layout>