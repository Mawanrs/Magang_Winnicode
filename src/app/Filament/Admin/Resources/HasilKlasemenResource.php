<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HasilKlasemenResource\Pages;
use App\Models\HasilKlasemen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HasilKlasemenResource extends Resource
{
    protected static ?string $model = HasilKlasemen::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';
    protected static ?string $recordTitleAttribute = 'rider_name';
    protected static ?int $navigationSort = -2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\Select::make('kategori')
                        ->label('Kategori')
                        ->options([
                            'MOTOGP' => 'MOTOGP™',
                            'MOTO2'  => 'MOTO2™',
                            'MOTO3'  => 'MOTO3™',
                            'MOTOE'  => 'MOTOE™',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('position')
                        ->label('Posisi')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('points')
                        ->label('Poin')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('gap_time')
                        ->label('Gap')
                        ->required(),

                    Forms\Components\TextInput::make('rider_number')
                        ->label('Nomor Pembalap')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('rider_name')
                        ->label('Nama Pembalap')
                        ->required(),

                    Forms\Components\TextInput::make('team')
                        ->label('Tim')
                        ->required(),

                    Forms\Components\Select::make('country_code')
                        ->label('Kode Negara')
                        ->options([
                            'es' => 'Spanyol 🇪🇸',
                            'it' => 'Italia 🇮🇹',
                            'fr' => 'Prancis 🇫🇷',
                            'jp' => 'Jepang 🇯🇵',
                            'gb' => 'Inggris 🇬🇧',
                            'us' => 'Amerika 🇺🇸',
                            // tambahkan negara lain sesuai kebutuhan
                        ])
                        ->required(),

                    Forms\Components\FileUpload::make('avatar_url')
                        ->label('Foto Pembalap')
                        ->image()
                        ->directory('foto_pembalap')
                        ->imagePreviewHeight('120')
                        ->nullable(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->sortable()
                    ->searchable(),
                    
                Tables\Columns\TextColumn::make('position')
                    ->label('Pos')
                    ->sortable(),

                Tables\Columns\TextColumn::make('rider_number')
                    ->label('Nomor')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('rider_name')
                    ->label('Nama Pembalap')
                    ->weight('bold')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('team')
                    ->label('Tim')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('points')
                    ->label('Poin')
                    ->sortable(),

                Tables\Columns\TextColumn::make('gap_time')
                    ->label('Gap')
                    ->sortable(),

                Tables\Columns\TextColumn::make('country_code')
                    ->label('Negara')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\ImageColumn::make('avatar_url')
                    ->disk('public')
                    ->label('Foto')
                    ->circular()
                    ->size(45),
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHasilKlasemen::route('/'),
            'create' => Pages\CreateHasilKlasemen::route('/create'),
            'edit' => Pages\EditHasilKlasemen::route('/{record}/edit'),
        ];
    }
}
