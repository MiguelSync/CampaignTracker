<x-app-layout>
    <div class="min-h-screen bg-[#f2f3f5] font-sans">

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
            <span class="text-[14px] font-semibold text-[#313338]">Nova Campanha</span>
        </div>

        <div class="flex justify-center py-10 px-4">
            <div class="w-full max-w-lg">

                {{-- Erros --}}
                @if ($errors->any())
                    <div class="mb-5 bg-[#fef2f2] border border-[#fca5a5] rounded-lg p-4">
                        <div class="flex items-center gap-2 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#dc2626]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                            </svg>
                            <p class="text-[13px] font-semibold text-[#dc2626]">Corrija os erros abaixo</p>
                        </div>
                        <ul class="space-y-1">
                            @foreach ($errors->all() as $erro)
                                <li class="text-[12px] text-[#b91c1c] pl-6">{{ $erro }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Card do formulário --}}
                <div class="bg-white rounded-xl border border-[#e3e5e8] shadow-sm overflow-hidden">
                    <div class="px-6 py-5 border-b border-[#e3e5e8] bg-[#f9f9fb]">
                        <h2 class="text-[18px] font-bold text-[#060607]">Criar Campanha</h2>
                        <p class="text-[13px] text-[#6d6f78] mt-0.5">Preencha as informações para começar sua aventura.</p>
                    </div>

                    <form action="{{ route('campaign.store') }}" method="post" class="px-6 py-6 space-y-5">
                        @csrf

                        {{-- Título --}}
                        <div>
                            <x-input-label for="title" class="block text-[12px] font-semibold uppercase tracking-wider text-[#6d6f78] mb-1.5">
                                Título <span class="text-[#ed4245]">*</span>
                            </x-input-label>
                            <x-text-input
                                id="title"
                                name="title"
                                type="text"
                                value="{{ old('title') }}"
                                placeholder="Ex: A Maldição do Castelo..."
                                class="w-full px-3 py-2 bg-[#f2f3f5] border border-[#e3e5e8] rounded-md text-[14px] text-[#313338] placeholder-[#b5bac1] focus:outline-none focus:border-[#5865f2] focus:ring-2 focus:ring-[#5865f2]/20 transition"
                            />
                        </div>

                        {{-- Descrição --}}
                        <div>
                            <label for="description" class="block text-[12px] font-semibold uppercase tracking-wider text-[#6d6f78] mb-1.5">
                                Descrição
                            </label>
                            <textarea
                                id="description"
                                name="description"
                                rows="4"
                                placeholder="Descreva sua campanha, o cenário, a premissa..."
                                class="w-full px-3 py-2 bg-[#f2f3f5] border border-[#e3e5e8] rounded-md text-[14px] text-[#313338] placeholder-[#b5bac1] focus:outline-none focus:border-[#5865f2] focus:ring-2 focus:ring-[#5865f2]/20 transition resize-none"
                            >{{ old('description') }}</textarea>
                        </div>

                        {{-- Data de início --}}
                        <div>
                            <label for="started_at" class="block text-[12px] font-semibold uppercase tracking-wider text-[#6d6f78] mb-1.5">
                                Data de início
                            </label>
                            <input
                                type="datetime-local"
                                id="started_at"
                                name="started_at"
                                value="{{ old('started_at') }}"
                                class="w-full px-3 py-2 bg-[#f2f3f5] border border-[#e3e5e8] rounded-md text-[14px] text-[#313338] focus:outline-none focus:border-[#5865f2] focus:ring-2 focus:ring-[#5865f2]/20 transition"
                            />
                        </div>

                        {{-- Botões --}}
                        <div class="flex items-center justify-end gap-3 pt-2 border-t border-[#e3e5e8]">
                            <a href="{{ route('campaign.index') }}"
                                class="px-4 py-2 text-[13px] font-semibold text-[#6d6f78] hover:text-[#313338] hover:bg-[#f2f3f5] rounded-md transition-colors">
                                Cancelar
                            </a>
                            <x-primary-button type="submit"
                                class="px-5 py-2 bg-[#5865f2] hover:bg-[#4752c4] text-white text-[13px] font-semibold rounded-md transition-colors shadow-sm">
                                Criar Campanha
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>