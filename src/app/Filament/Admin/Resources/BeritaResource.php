<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BeritaResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class BeritaResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = -1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email', 'roles.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Role' => $record->roles->pluck('name')->implode(', '),
            'Email' => $record->email,
        ];
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')
                ->sortable(),

            Tables\Columns\TextColumn::make('title')
                ->label('Judul')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('slug')
                ->label('Slug')
                ->sortable()
                ->searchable(),

            Tables\Columns\ImageColumn::make('image')
                ->label('Gambar')
                ->disk('public')
                ->circular(),

            Tables\Columns\TextColumn::make('created_at')
                ->date('d-m-Y')
                ->label('Tgl Dibuat')
                ->sortable(),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->emptyStateActions([
            Tables\Actions\CreateAction::make(),
        ]);
}
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(News::class, 'slug', ignoreRecord: true)
                    ->columnSpanFull(),

                Forms\Components\FileUpload::make('image')
                    ->label('Gambar')
                    ->disk('public')
                    ->directory('berita')
                    ->image()
                    ->required(),

                Forms\Components\RichEditor::make('content')
                    ->label('Konten Berita')
                    ->required(),
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
            'index' => Pages\ListBerita::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}
