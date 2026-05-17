<div class="flex flex-col space-y-6">
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Informações Pessoais') }}
        </h2>
</div>
    <div>
        <x-input-label>Email</x-input-label>
        <x-text-input name="email" :value="$user->email" :disabled="true"/>
    </div>
    <div>
        <x-input-label>Bio</x-input-label>
        <x-text-input name="bio" :value="$user->bio" :disabled="true"/>
    </div>
    <div>
        <x-input-label>Esilo de Jogo</x-input-label>
        <x-text-input name="playstyle" :value="$user->playstyle" :disabled="true"/>
    </div>
</div>