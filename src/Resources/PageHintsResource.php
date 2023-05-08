<?php

namespace Discoverlance\FilamentPageHints\Resources;

use Discoverlance\FilamentPageHints\Concerns\HintForm;
use Discoverlance\FilamentPageHints\Models\PageHint;
use Discoverlance\FilamentPageHints\Resources\PageHintsResource\Pages;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class PageHintsResource extends Resource
{
    protected static ?string $model = PageHint::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $recordTitleAttribute = 'title';

    protected static function shouldRegisterNavigation(): bool
    {
        return config('filament-page-hints.show_resource_in_navigation', true);
    }

    protected static function getNavigationSort(): ?int
    {
        return config('filament-page-hints.navigation_sort', null);
    }

    protected static function getNavigationBadge(): ?string
    {
        return config('filament-page-hints.navigation_badge', null);
    }

    protected static function getNavigationBadgeColor(): ?string
    {
        return config('filament-page-hints.navigation_badge_color', null);
    }

    protected static function getNavigationGroup(): ?string
    {
        return config('filament-page-hints.navigation_group', null);
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema(
                [...HintForm::new()]
            );
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(trans('filament-page-hints::translations.resource.table.title'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('url')
                    ->label(trans('filament-page-hints::translations.resource.table.url'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('route')
                    ->label(trans('filament-page-hints::translations.resource.table.route'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('hint')
                    ->html()
                    ->label(trans('filament-page-hints::translations.resource.table.hint'))
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('video_url')
                    ->label(trans('filament-page-hints::translations.resource.table.video_url'))
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPageHints::route('/'),
            'create' => Pages\CreatePageHints::route('/create'),
            'edit' => Pages\EditPageHints::route('/{record}/edit'),
        ];
    }

    public static function getModelLabel(): string
    {
        return __('filament-page-hints::translations.resource.label.hint');
    }

    public static function getPluralModelLabel(): string
    {
        return __('filament-page-hints::translations.resource.label.hints');
    }

    protected static function getNavigationLabel(): string
    {
        return __('filament-page-hints::translations.nav.label');
    }

    protected static function getNavigationIcon(): string
    {
        return __('filament-page-hints::translations.nav.icon');
    }
}
