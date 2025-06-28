<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\VideoResource\Pages;
use App\Models\Video;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class VideoResource extends Resource
{
    protected static ?string $model = Video::class;

    protected static ?string $navigationIcon = 'heroicon-o-play-circle';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?int $navigationSort = -2;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'desc', 'youtube_url', 'duration', 'slug'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Judul'    => $record->title,
            'Durasi'   => $record->duration,
            'YouTube'  => $record->youtube_url,
            'Thumbnail'=> $record->thumbnail ? '✔️ Ada' : '❌ Tidak ada',
            'Slug'     => $record->slug,
        ];
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Grid::make(2)->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Judul Video')
                    ->required(),

                Forms\Components\TextInput::make('slug')
                    ->label('Slug (otomatis)')
                    ->unique(ignoreRecord: true)
                    ->disabled(),

                Forms\Components\Textarea::make('desc')
                    ->label('Deskripsi')
                    ->rows(4),

                Forms\Components\TextInput::make('youtube_url')
                    ->label('Link YouTube')
                    ->required(),

                Forms\Components\TextInput::make('duration')
                    ->label('Durasi')
                    ->placeholder('01:23:00'),

                Forms\Components\FileUpload::make('thumbnail')
                    ->label('Thumbnail')
                    ->image()
                    ->directory('videos')
                    ->imagePreviewHeight('90')
                    ->nullable(),
            ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable()->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->size(60)
                    ->circular()
                    ->defaultImageUrl(url('https://upload.wikimedia.org/wikipedia/commons/6/65/No-Image-Placeholder.svg')),
                Tables\Columns\TextColumn::make('title')->label('Judul')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('duration')->label('Durasi')->sortable(),
                Tables\Columns\TextColumn::make('youtube_url')->label('YouTube')
                    ->url(fn ($record) => $record->youtube_url)
                    ->openUrlInNewTab()
                    ->formatStateUsing(fn ($state) => 'Lihat'),
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
            'index' => Pages\ListVideo::route('/'),
            'create' => Pages\CreateVideo::route('/create'),
            'edit' => Pages\EditVideo::route('/{record}/edit'),
        ];
    }
}
