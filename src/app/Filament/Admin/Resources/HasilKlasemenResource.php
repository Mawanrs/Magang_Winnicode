<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\HasilKlasemenResource\Pages;
use App\Models\HasilKlasemen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class HasilKlasemenResource extends Resource
{
    protected static ?string $model = HasilKlasemen::class;

    protected static ?string $navigationIcon = 'heroicon-o-trophy';

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
                Forms\Components\Grid::make(2)->schema([
                    Forms\Components\TextInput::make('position')
                        ->label('Posisi')
                        ->numeric()
                        ->required(),

                    Forms\Components\TextInput::make('points')
                        ->label('Poin')
                        ->numeric()
                        ->required(),
                        
                    Forms\Components\TextInput::make('rider_number')
                        ->label('No')
                        ->numeric()
                        ->required(),

                    Forms\Components\FileUpload::make('avatar_url')
                        ->label('Foto Pembalap')
                        ->image()
                        ->imagePreviewHeight('120')
                        ->required(),

                    Forms\Components\TextInput::make('rider_name')
                        ->label('Nama Pembalap')
                        ->required(),

                    Forms\Components\Select::make('country_code')
                    ->label('Negara')
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

                    Forms\Components\TextInput::make('team')
                        ->label('Tim')
                        ->required(),

                    Forms\Components\TextInput::make('gap_time')
                        ->label('Waktu / Gap')
                        ->required(),
                ]),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('position')
                    ->label('Pos.')
                    ->sortable(),

                Tables\Columns\TextColumn::make('points')
                    ->label('Poin')
                    ->sortable(),

                Tables\Columns\TextColumn::make('rider_number')
                    ->label('No')
                    ->weight('bold'),

                Tables\Columns\ImageColumn::make('avatar_url')
                    ->label('')
                    ->circular()
                    ->size(45),

                Tables\Columns\TextColumn::make('rider_name')
                    ->label('Pembalap')
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('country_code')
                    ->label('Negara')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('team')
                    ->label('Tim')
                    ->sortable(),

                Tables\Columns\TextColumn::make('gap_time')
                    ->label('Waktu / Gap')
                    ->alignRight(),
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
        return [
            //
        ];
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
