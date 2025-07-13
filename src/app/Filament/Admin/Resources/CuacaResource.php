<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\CuacaResource\Pages;
use App\Models\Cuaca;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CuacaResource extends Resource
{
    protected static ?string $model = Cuaca::class;

    protected static ?string $navigationIcon = 'heroicon-o-cloud';

    protected static ?string $navigationGroup = 'Informasi Cuaca';

    protected static ?string $navigationLabel = 'Cuaca';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('cuaca')
                ->label('Cuaca')
                ->required(),

            Forms\Components\TextInput::make('suhu_udara')
                ->label('Suhu Udara')
                ->required(),

            Forms\Components\TextInput::make('kondisi_lintasan')
                ->label('Kondisi Lintasan')
                ->required(),

            Forms\Components\TextInput::make('kelembapan')
                ->label('Kelembapan')
                ->required(),

            Forms\Components\TextInput::make('suhu_tanah')
                ->label('Suhu Tanah')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('cuaca')
                    ->label('Cuaca')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('suhu_udara')
                    ->label('Suhu Udara')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kondisi_lintasan')
                    ->label('Kondisi Lintasan')
                    ->sortable(),

                Tables\Columns\TextColumn::make('kelembapan')
                    ->label('Kelembapan'),

                Tables\Columns\TextColumn::make('suhu_tanah')
                    ->label('Suhu Tanah'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('d-m-Y H:i')
                    ->label('Dibuat'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCuacas::route('/'),
            'create' => Pages\CreateCuaca::route('/create'),
            'edit' => Pages\EditCuaca::route('/{record}/edit'),
        ];
    }
}
