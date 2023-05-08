@props(['hints'])

<x-filament::modal id="page-hints" close-button slide-over width="md">
    @if ($hints->count())
        <x-slot name="header">
            <div class="flex justify-between gap-2">
                <x-filament-page-hints::modal.heading />

                <x-filament-page-hints::modal.actions />
            </div>
        </x-slot>

        <div class="mt-[calc(-1rem-1px)]">
            @foreach ($hints as $hint)
                <div @class([
                    '-mx-6 border-b border-t',
                    'dark:border-gray-700' => config('notifications.dark_mode'),
                    'dark:border-gray-800' => config('notifications.dark_mode'),
                ])>
                    <div @class([
                        'py-2 pl-4 pr-2 -mb-px space-y-2',
                        'dark:bg-gray-700' => config('notifications.dark_mode'),
                    ])>
                        <div class="flex justify-between gap-2 flex-wraps">
                            <p class="flex-1 text-xl font-bold">{{ $hint->title }}</p>
                            <div>
                                <x-filament-page-hints::link
                                    x-on:click="
                                    $wire.editPageHint('{{ $hint->uuid }}')
                                        .then(() => $dispatch('open-modal', { id: 'create-hint' }))
                                    "
                                    class="text-sm" color="{{ config('filament-page-hints.upsert_hint_button_color') }}"
                                    wire:target="editPageHint('{{ $hint->uuid }}')" tag="button"
                                    wire:loading.attr="disabled" wire:loading.class="cursor-wait opacity-70">
                                    <x-heroicon-s-pencil class="w-5 h-5" />
                                    {{-- {{ __('filament-page-hints::translations.modal.buttons.edit.label') }} --}}
                                </x-filament-page-hints::link>
                            </div>
                            <div>
                                <x-filament-page-hints::link
                                    onclick="confirm('{{ __('filament-page-hints::translations.modal.alert.delete') }}') || event.stopImmediatePropagation()"
                                    x-on:click="
                                        await $wire.deletePageHint('{{ $hint->uuid }}')
                                    "
                                    class="text-sm" color="{{ config('filament-page-hints.delete_hint_button_color') }}"
                                    wire:target="deletePageHint('{{ $hint->uuid }}')" tag="button"
                                    wire:loading.attr="disabled" wire:loading.class="cursor-wait opacity-70">
                                    <x-heroicon-s-trash class="w-5 h-5" />
                                    {{-- {{ __('filament-page-hints::translations.modal.buttons.delete.label') }} --}}
                                </x-filament-page-hints::link>
                            </div>
                        </div>
                        <div @class([
                            'prose prose-sm mt-2 text-sm',
                            'dark:prose-invert' => config('notifications.dark_mode'),
                        ])>
                            {!! $hint->hint !!}
                        </div>

                        {{-- Video, if any --}}
                        @if ($hint->video_url)
                            <div class="relative" style="padding-top: 56.25%">
                                <iframe class="absolute inset-0 w-full h-full" src="{{ $hint->embed_url }}"
                                    title="Video player" frameborder="0"
                                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                    allowfullscreen></iframe>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <x-filament-page-hints::modal.empty-state />
    @endif
</x-filament::modal>
