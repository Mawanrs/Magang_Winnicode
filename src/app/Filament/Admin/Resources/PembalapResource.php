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
    protected static ?string $recordTitleAttribute = 'rider_name';
    protected static ?int $navigationSort = -2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['rider_number', 'rider_name', 'team', 'country_code'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Nomor' => $record->rider_number,
            'Nama' => $record->rider_name,
            'Tim' => $record->team,
            'Negara' => $record->country_code,
            'Bendera' => $record->flag_image ? '✔️ Ada' : '❌ Tidak ada',
            'Foto Pembalap' => $record->avatar_url ? '✔️ Ada' : '❌ Tidak ada',
        ];
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('rider_number')
                        ->label('Nomor Pembalap')
                        ->required(),

                    Forms\Components\TextInput::make('rider_name')
                        ->label('Nama Pembalap')
                        ->required(),

                    Forms\Components\TextInput::make('team')
                        ->label('Tim')
                        ->required(),

                    Forms\Components\FileUpload::make('flag_image')
                        ->label('Foto Bendera')
                        ->image()
                        ->directory('bendera_pembalap')
                        ->imagePreviewHeight('40')
                        ->nullable(),

                    Forms\Components\FileUpload::make('avatar_url')
                        ->label('Foto Pembalap')
                        ->image()
                        ->directory('foto_pembalap')
                        ->imagePreviewHeight('80')
                        ->nullable(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('rider_number')->label('Nomor')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('rider_name')->label('Nama')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('flag_image')
                    ->label('Bendera')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(url('https://upload.wikimedia.org/wikipedia/commons/4/48/Blank_flag.svg')),
                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('Foto')
                    ->disk('public')
                    ->circular()
                    ->defaultImageUrl(url('https://www.gravatar.com/avatar/64e1b8d34f425d19e1ee2ea7236d3028?d=mp&r=g&s=250')),
                Tables\Columns\TextColumn::make('team')->label('Tim')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('created_at')->label('Dibuat')->date()->sortable(),
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
