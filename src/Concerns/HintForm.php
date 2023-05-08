<?php

namespace Discoverlance\FilamentPageHints\Concerns;

use Closure;
use Discoverlance\FilamentPageHints\Resources\PageHintsResource\Pages;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Illuminate\Support\Facades\Route;
use Livewire\Component as Livewire;

class HintForm
{
    public static function getTitleComponent(): \Filament\Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('title')
            ->label(__('filament-page-hints::translations.resource.form.title'))
            ->placeholder(__('filament-page-hints::translations.resource.form.title.placeholder.label'))
            ->maxLength(255)
            ->required();
    }

    public static function getHintComponent(): \Filament\Forms\Components\RichEditor
    {
        return Forms\Components\RichEditor::make('hint')
            ->label(__('filament-page-hints::translations.resource.form.hint'))
            ->placeholder(__('filament-page-hints::translations.resource.form.hint.placeholder.label'))
            ->required()
            ->toolbarButtons(config('filament-page-hints.toolbar_buttons', []));
    }

    public static function getUrlComponent(): \Filament\Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('url')
            ->label(__('filament-page-hints::translations.resource.form.url'))
            ->placeholder(__('filament-page-hints::translations.resource.form.url.placeholder.label'))
            ->url()
            ->hidden(fn (Livewire $livewire) => $livewire instanceof Pages\CreatePageHints)
            ->nullable();
    }

    public static function getVideoUrlComponent(): \Filament\Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('video_url')
            ->label(__('filament-page-hints::translations.resource.form.video_url'))
            ->placeholder(__('filament-page-hints::translations.resource.form.video_url.placeholder.label'))
            ->url()
            ->rules([
                function () {
                    return function (string $attribute, $value, Closure $fail) {
                        if (
                            ! preg_match('/^(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/i', $value) &&
                            ! preg_match('/^(?:https?:\/\/)?(?:www\.)?vimeo\.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|)(\d+)/i', $value)
                        ) {
                            $fail("__('filament-page-hints::translations.resource.form.video_url.error')");
                        }
                    };
                },
            ])
            ->nullable();
    }

    public static function getRouteComponent(): \Filament\Forms\Components\TextInput
    {
        return Forms\Components\TextInput::make('route')
            ->label(__('filament-page-hints::translations.resource.form.route'))
            ->placeholder(__('filament-page-hints::translations.resource.form.route.placeholder.label'))
            ->required()
            ->rules([
                function () {
                    return function (string $attribute, $value, Closure $fail) {
                        if (Route::has($value) === false) {
                            $fail("The {$attribute} is an invalid route.");
                        }
                    };
                },
            ]);
    }

    public static function new(): array
    {
        return [
            Card::make()
                ->schema([
                    self::getTitleComponent(),
                    self::getRouteComponent(),
                    self::getUrlComponent(),
                    self::getHintComponent(),
                    self::getVideoUrlComponent(),
                ]),
        ];
    }
}
