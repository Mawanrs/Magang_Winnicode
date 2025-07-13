<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HasilBalapanResource\Pages;
use App\Models\HasilBalapan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HasilBalapanResource extends Resource
{
    protected static ?string $model = HasilBalapan::class;

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

                    Forms\Components\TextInput::make('grand_prix')
                        ->label('Grand Prix')
                        ->required(),

                    Forms\Components\TextInput::make('tahun')
                        ->label('Tahun')
                        ->numeric()
                        ->required(),

                    Forms\Components\Select::make('type')
                        ->label('Type')
                        ->options([
                            'Grands Prix' => 'Grands Prix',
                            'MotoGP' => 'MotoGP',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('posisi')
                        ->label('Posisi')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('event')
                        ->label('Event')
                        ->required(),

                    Forms\Components\Select::make('sesi')
                        ->label('Sesi')
                        ->options([
                            'RAC' => 'RAC',
                            'Q1' => 'Q1',
                            'Q2' => 'Q2',
                            'FP1' => 'FP1',
                            'FP2' => 'FP2',
                            'FP3' => 'FP3',
                        ])
                        ->required(),

                    Forms\Components\TextInput::make('waktu_gap')
                        ->label('Waktu/Gap')
                        ->nullable(),

                    Forms\Components\TextInput::make('pembalap')
                        ->label('Nama Pembalap')
                        ->required(),

                    Forms\Components\TextInput::make('tim')
                        ->label('Tim')
                        ->required(),

                    Forms\Components\Toggle::make('diklasifikasikan')
                        ->label('Diklasifikasikan')
                        ->default(true)
                        ->required(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pembalap')
                ->label('Pembalap')
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('posisi')
                ->label('Pos')
                ->sortable(),
                Tables\Columns\TextColumn::make('event')
                ->label('Event')
                ->sortable(),
                Tables\Columns\TextColumn::make('waktu_gap')
                ->label('Gap')
                ->sortable(),
                Tables\Columns\IconColumn::make('diklasifikasikan')
                ->label('Diklasifikasikan')
                ->boolean(),

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
            'index' => Pages\ListHasilBalapan::route('/'),
            'create' => Pages\CreateHasilBalapan::route('/create'),
            'edit' => Pages\EditHasilBalapan::route('/{record}/edit'),
        ];
    }
}
