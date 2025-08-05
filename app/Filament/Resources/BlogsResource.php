<?php

namespace App\Filament\Resources;

use Filament\Tables;
use App\Models\Blogs;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Illuminate\Support\Facades\Cache;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use App\Filament\Resources\BlogsResource\Pages;
use Filament\Forms\Get;

class BlogsResource extends Resource
{
    protected static ?string $model = Blogs::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->label('Judul')
                    ->required()
                    ->minLength(3)
                    ->maxLength(255)
                    ->debounce(500)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('slug', Str::slug($state));
                    }),
                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'kegiatan' => 'Kegiatan',
                        'tips' => 'Tips',
                        'wisata' => 'Wisata',
                        'resep' => 'Resep',
                    ])
                    ->required(),
                Hidden::make('slug')
                    ->required()
                    ->label('Slug'),

                RichEditor::make('content')
                    ->toolbarButtons([
                        'h1',
                        'h2',
                        'strike',
                        'bold',
                        'italic',
                        'link',
                        'bulletList',
                        'numberList',
                        'blockquote',
                    ])
                    ->label('Konten')
                    ->required()
                    ->minLength(10)
                    ->maxLength(65535)
                    ->columnSpanFull()
                    ->afterStateUpdated(function (Set $set, $state) {
                        $set('excerpt', Str::limit(strip_tags($state), 150, '...'));
                    }),
                Hidden::make('excerpt')
                    ->label('Excerpt (Opsional)'),
                FileUpload::make('image')
                    ->label('Gambar')
                    ->image()
                    ->required()
                    ->maxSize(2048) // 2MB
                    ->disk('public')
                    ->columnSpanFull()
                    ->directory('blogs/images'),
                Select::make('author_id')
                    ->label('Penulis')
                    ->relationship('author', 'name')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->columnSpanFull()
                    ->live(onBlur: true),
                Hidden::make('published_at')
                    ->label('Tanggal Terbit')
                    ->required()
                    ->default(now('Asia/Jakarta')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->label('Penulis')
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal Terbit')
                    ->dateTime('d F Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->after(function () {
                    Cache::forget('blogs');
                }),
                Tables\Actions\DeleteAction::make()->after(function () {
                    Cache::forget('blogs');
                }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBlogs::route('/'),
        ];
    }
}
