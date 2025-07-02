<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\KlasemenTimResource\Pages;
use App\Models\KlasemenTim;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class KlasemenTimResource extends Resource
{
    protected static ?string $model = KlasemenTim::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

    protected static ?string $recordTitleAttribute = 'tim';

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

                    Forms\Components\TextInput::make('posisi')
                        ->label('Posisi')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('pembalap')
                        ->label('Nama Pembalap')
                        ->required(),
                    
                    Forms\Components\TextInput::make('tim')
                        ->label('Tim')
                        ->required(),

                    Forms\Components\TextInput::make('poin')
                        ->label('Poin')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('gap')
                        ->label('Gap')
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
                    ->sortable(),
                Tables\Columns\TextColumn::make('posisi')
                    ->label('Posisi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pembalap')
                    ->label('Pembalap')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tim')
                    ->label('Tim')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('poin')
                    ->label('Poin')
                    ->sortable(),
                Tables\Columns\TextColumn::make('gap')
                    ->label('Gap')
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

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKlasemenTim::route('/'),
            'create' => Pages\CreateKlasemenTim::route('/create'),
            'edit' => Pages\EditKlasemenTim::route('/{record}/edit'),
        ];
    }
}
