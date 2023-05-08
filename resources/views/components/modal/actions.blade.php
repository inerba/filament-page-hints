<div {{ $attributes }}>
    <div class="mt-2 text-sm">
        <x-filament-page-hints::link x-on:click="$dispatch('open-modal', { id: 'create-hint' })" color="secondary"
            tag="button" tabindex="-1" wire:loading.attr="disabled" wire:loading.class="cursor-wait opacity-70">
            {{ __('filament-page-hints::translations.modal.buttons.create.label') }}
            <x-heroicon-s-plus-circle class="w-6 h-6 text-success-600" />
        </x-filament-page-hints::link>
    </div>
</div>
