<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\JadwalPertandinganResource\Pages;
use App\Models\JadwalPertandingan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class JadwalPertandinganResource extends Resource
{
    protected static ?string $model = JadwalPertandingan::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = -2;

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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)
                    ->schema([
                        Forms\Components\TextInput::make('nama_pertandingan')
                            ->label('Nama Pertandingan')
                            ->required()
                            ->columnSpan('full'),
                        Forms\Components\DateTimePicker::make('tanggal_dan_waktu')
                            ->label('Tanggal & Waktu')
                            ->required(),
                        Forms\Components\TextInput::make('negara')
                            ->label('Negara')
                            ->required(),
                            Forms\Components\TextInput::make('nama_event')
                            ->label('Nama Event')
                            ->required(),
                    ]),
            ]);
    }


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('id')
            ->sortable()
            ->searchable(),
            Tables\Columns\TextColumn::make('nama_pertandingan')->label('Nama Pertandingan')
            ->sortable()
            ->searchable(),
            Tables\Columns\TextColumn::make('negara')->label('Negara')
            ->sortable()
            ->searchable(),
            Tables\Columns\TextColumn::make('tanggal_dan_waktu')->label('Tanggal & Waktu')
            ->dateTime()
            ->sortable(),
            Tables\Columns\TextColumn::make('status')
            ->badge()
            ->sortable(),
            Tables\Columns\TextColumn::make('nama_event')->label('Event')
            ->sortable()
            ->searchable(),
        ])
        ->actions([
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ])
        ->emptyStateActions([
            Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListJadwalPertandingan::route('/'),
            'create' => Pages\CreateJadwalPertandingan::route('/create'),
            'edit' => Pages\EditJadwalPertandingan::route('/{record}/edit'),
        ];
    }
}
