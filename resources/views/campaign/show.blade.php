@php
    $isCampaignOwner = auth()->user()->can('isCampaignOwner', $campaign);
@endphp

<x-app-layout>
    <div class="min-h-screen bg-[#f2f3f5] font-sans" x-data="{ openCampaignModal: false }">

        {{-- ===================== MODAL: CRIAR CAMPANHA ===================== --}}
        <div
            x-show="openCampaignModal"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="fixed inset-0 z-50 flex items-center justify-center p-4"
            style="display: none;"
        >
            <div class="absolute inset-0 bg-black/50" x-on:click="openCampaignModal = false"></div>

            <div
                x-show="openCampaignModal"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95 translate-y-1"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                x-transition:leave-end="opacity-0 scale-95 translate-y-1"
                class="relative w-full max-w-md bg-white rounded-xl border border-[#e3e5e8] shadow-xl overflow-hidden z-10"
                x-on:click.stop
            >
                {{-- Header --}}
                <div class="px-6 py-4 border-b border-[#e3e5e8] bg-[#f9f9fb] flex items-center justify-between">
                    <div>
                        <h3 class="text-[16px] font-bold text-[#060607]">Nova Campanha</h3>
                        <p class="text-[12px] text-[#6d6f78] mt-0.5">Preencha as informações para começar.</p>
                    </div>
                    <button x-on:click="openCampaignModal = false"
                        class="w-7 h-7 flex items-center justify-center rounded-md text-[#6d6f78] hover:text-[#313338] hover:bg-[#f2f3f5] transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Erros --}}
                @if ($errors->any())
                    <div class="mx-6 mt-4 bg-[#fef2f2] border border-[#fca5a5] rounded-lg p-3">
                        <div class="flex items-center gap-2 mb-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#dc2626] shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                            <p class="text-[12px] font-semibold text-[#dc2626]">Corrija os erros abaixo</p>
                        </div>
                        <ul class="space-y-0.5 pl-6">
                            @foreach ($errors->all() as $erro)
                                <li class="text-[12px] text-[#b91c1c]">{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form --}}
                <form action="{{ route('campaign.store') }}" method="POST" class="px-6 py-5 space-y-4">
                    @csrf

                    <div>
                        <label for="modal_title" class="block text-[11px] font-semibold uppercase tracking-wider text-[#6d6f78] mb-1.5">
                            Título <span class="text-[#ed4245]">*</span>
                        </label>
                        <input type="text" id="modal_title" name="title" value="{{ old('title') }}"
                            placeholder="Ex: A Maldição do Castelo..."
                            class="w-full px-3 py-2 bg-[#f2f3f5] border border-[#e3e5e8] rounded-md text-[14px] text-[#313338] placeholder-[#b5bac1] focus:outline-none focus:border-[#5865f2] focus:ring-2 focus:ring-[#5865f2]/20 transition" />
                    </div>

                    <div>
                        <label for="modal_description" class="block text-[11px] font-semibold uppercase tracking-wider text-[#6d6f78] mb-1.5">
                            Descrição
                        </label>
                        <textarea id="modal_description" name="description" rows="3"
                            placeholder="Descreva o cenário, a premissa..."
                            class="w-full px-3 py-2 bg-[#f2f3f5] border border-[#e3e5e8] rounded-md text-[14px] text-[#313338] placeholder-[#b5bac1] focus:outline-none focus:border-[#5865f2] focus:ring-2 focus:ring-[#5865f2]/20 transition resize-none">{{ old('description') }}</textarea>
                    </div>

                    <div>
                        <label for="modal_started_at" class="block text-[11px] font-semibold uppercase tracking-wider text-[#6d6f78] mb-1.5">
                            Data de início
                        </label>
                        <input type="datetime-local" id="modal_started_at" name="started_at" value="{{ old('started_at') }}"
                            class="w-full px-3 py-2 bg-[#f2f3f5] border border-[#e3e5e8] rounded-md text-[14px] text-[#313338] focus:outline-none focus:border-[#5865f2] focus:ring-2 focus:ring-[#5865f2]/20 transition" />
                    </div>

                    <div class="flex items-center justify-end gap-3 pt-3 border-t border-[#e3e5e8]">
                        <button type="button" x-on:click="openCampaignModal = false"
                            class="px-4 py-2 text-[13px] font-semibold text-[#6d6f78] hover:text-[#313338] hover:bg-[#f2f3f5] rounded-md transition-colors">
                            Cancelar
                        </button>
                        <button type="submit"
                            class="px-5 py-2 bg-[#5865f2] hover:bg-[#4752c4] text-white text-[13px] font-semibold rounded-md transition-colors shadow-sm">
                            Criar Campanha
                        </button>
                    </div>
                </form>
            </div>
        </div>
        {{-- ===================== FIM MODAL ===================== --}}

        {{-- Topbar --}}
        <div class="h-12 bg-white border-b border-[#e3e5e8] flex items-center px-5 gap-3 shadow-sm">
            <a href="{{ route('campaign.index') }}"
                class="flex items-center gap-1.5 text-[13px] text-[#6d6f78] hover:text-[#313338] transition-colors group">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
                Campanhas
            </a>
            <span class="text-[#e3e5e8]">/</span>
            <span class="text-[14px] font-semibold text-[#313338]">{{ $campaign->title }}</span>
            <div class="ml-auto">
                <button x-on:click="openCampaignModal = true"
                    class="flex items-center gap-1.5 px-3 py-1.5 bg-[#5865f2] hover:bg-[#4752c4] text-white text-[13px] font-semibold rounded-md transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Nova Campanha
                </button>
            </div>
        </div>

        <div class="max-w-4xl mx-auto py-8 px-4 space-y-5">

            {{-- Card: Informações --}}
            <div class="bg-white rounded-xl border border-[#e3e5e8] shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-[#e3e5e8] bg-[#f9f9fb] flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#5865f2]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z" />
                    </svg>
                    <h3 class="text-[14px] font-bold text-[#313338] uppercase tracking-wide">Informações</h3>
                </div>

                <form action="{{ route('campaign.update', $campaign->id) }}" method="POST" class="px-6 py-5 space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="game_id" class="block text-[12px] font-semibold uppercase tracking-wider text-[#6d6f78] mb-1.5">
                            Jogo
                        </label>
                        <select name="game_id" id="game_id">
                            @foreach ($games as $game)
                                <option value="{{ $game->id }}" @selected($game->id == $campaign->game->id)>{{ $game->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="description" class="block text-[11px] font-semibold uppercase tracking-wider text-[#6d6f78] mb-1.5">Descrição</label>
                        <x-text-input id="description" name="description" :value="$campaign->description"
                            :disabled="!$isCampaignOwner"
                            class="w-full px-3 py-2 bg-[#f2f3f5] border border-[#e3e5e8] rounded-md text-[14px] text-[#313338] disabled:opacity-60 disabled:cursor-not-allowed focus:outline-none focus:border-[#5865f2] focus:ring-2 focus:ring-[#5865f2]/20 transition" />
                    </div>

                    <div>
                        <label for="status" class="block text-[11px] font-semibold uppercase tracking-wider text-[#6d6f78] mb-1.5">Status</label>
                        <div class="relative">
                            <select name="status" id="status" @disabled(!$isCampaignOwner)
                                class="w-full px-3 py-2 pr-8 bg-[#f2f3f5] border border-[#e3e5e8] rounded-md text-[14px] text-[#313338] appearance-none disabled:opacity-60 disabled:cursor-not-allowed focus:outline-none focus:border-[#5865f2] focus:ring-2 focus:ring-[#5865f2]/20 transition">
                                @foreach ($campaignStatus as $item)
                                    <option value="{{ $item['id'] }}" @selected($campaign->status == $item['id'])>{{ $item['description'] }}</option>
                                @endforeach
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-3 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#6d6f78]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    @if($isCampaignOwner)
                        <div class="flex justify-end pt-2 border-t border-[#e3e5e8]">
                            <button type="submit"
                                class="px-5 py-2 bg-[#5865f2] hover:bg-[#4752c4] text-white text-[13px] font-semibold rounded-md transition-colors shadow-sm">
                                Salvar Alterações
                            </button>
                        </div>
                    @endif
                </form>
            </div>

            {{-- Card: Jogadores --}}
            <div class="bg-white rounded-xl border border-[#e3e5e8] shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-[#e3e5e8] bg-[#f9f9fb] flex items-center justify-between">
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#5865f2]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                        </svg>
                        <h3 class="text-[14px] font-bold text-[#313338] uppercase tracking-wide">Jogadores</h3>
                    </div>
                    @if($isCampaignOwner)
                        <button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'modal_campaign_user_create')"
                            class="flex items-center gap-1.5 px-3 py-1.5 bg-[#5865f2] hover:bg-[#4752c4] text-white text-[13px] font-semibold rounded-md transition-colors shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Adicionar Jogador
                        </button>
                    @endif
                </div>

                @include('campaign.modal.campaign_user_create_modal')

                <div class="px-6 py-4">
                    <livewire:campaign-user.campaign-user-list
                        :campaign="$campaign"
                        :campaignUserStatus="$campaignUserStatus"
                        :campaignUserRole="$campaignUserRole"
                        :isCampaignOwner="$isCampaignOwner"
                    />
                </div>
            </div>

            @if ($isCampaignOwner)
                  <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                      <div class="max-w-xl">
                          <form action="{{ route('campaign.destroy', $campaign->id) }}"
                                method="POST">
                              @csrf
                              @method('DELETE')
                            
                              <button type="submit"
                                      onclick="return confirm('Tem certeza que deseja deletar esta campanha?')"
                                      class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                  Deletar
                              </button>
                          </form>
                      </div>
                  </div>
              @endif

        </div>
    </div>


    {{-- Reabre o modal automaticamente se houver erros de validação --}}
    @if($errors->any())
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.nextTick(() => {
                    document.querySelector('[x-data]').__x.$data.openCampaignModal = true;
                });
            });
        </script>
    @endif

</x-app-layout>