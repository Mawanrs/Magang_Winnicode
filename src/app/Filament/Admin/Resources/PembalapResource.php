<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PembalapResource\Pages;
use App\Models\Pembalap;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PembalapResource extends Resource
{
    protected static ?string $model = Pembalap::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $recordTitleAttribute = 'name';
    
    protected static ?int $navigationSort = -2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['tag_name', 'name', 'flag_image', 'avatar_url', 'team'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Tag Name' => $record->tag_name,
            'Name' => $record->name,
            'Flag Image' => $record->flag_image ? '✔️ Ada' : '❌ Tidak ada',
            'Foto Pembalap' => $record->avatar_url ? '✔️ Ada' : '❌ Tidak ada',
            'Team' => $record->team,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('tag_name')
                    ->label('Nama Tag')
                    ->minLength(2)
                    ->maxLength(255)
                    ->required()
                    ->columnSpan('full'),

                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->minLength(2)
                    ->maxLength(255)
                    ->columnSpan('full'),

                Forms\Components\FileUpload::make('flag_image')
                    ->label('Foto Bendera')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'])
                    ->imageEditor()
                    ->imagePreviewHeight('250')
                    ->panelAspectRatio('7:2')
                    ->panelLayout('integrated')
                    ->columnSpan('full'),

                Forms\Components\TextInput::make('flag_name')
                    ->label('Nama Bendera')
                    ->required()
                    ->minLength(2)
                    ->maxLength(255)
                    ->columnSpan('full'),

                Forms\Components\FileUpload::make('avatar_url')
                    ->label('Foto Pembalap')
                    ->image()
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'])
                    ->imageEditor()
                    ->imagePreviewHeight('250')
                    ->panelAspectRatio('7:2')
                    ->panelLayout('integrated')
                    ->columnSpan('full'),

                Forms\Components\TextInput::make('team')
                    ->label('Tim')
                    ->required()
                    ->minLength(2)
                    ->maxLength(255)
                    ->columnSpan('full'),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('tag_name')->label('Nama Tag')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('name')->label('Nama')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('flag_image')
                    ->label('Bendera')
                    ->defaultImageUrl(url('https://upload.wikimedia.org/wikipedia/commons/4/48/Blank_flag.svg'))
                    ->circular(),
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Foto')
                    ->defaultImageUrl(url('https://www.gravatar.com/avatar/64e1b8d34f425d19e1ee2ea7236d3028?d=mp&r=g&s=250'))
                    ->circular(),
                Tables\Columns\TextColumn::make('team')->label('Tim')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->date()->sortable()->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPembalap::route('/'),
            'create' => Pages\CreatePembalap::route('/create'),
            'edit' => Pages\EditPembalap::route('/{record}/edit'),
        ];
    }
}
