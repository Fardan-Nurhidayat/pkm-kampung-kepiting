<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Nama Produk')
                ->required()
                ->reactive()
                // ->columnSpanFull()
                ->afterStateUpdated(fn (Set $set, $state) => $set('slug', Str::slug($state)))
                ->maxLength(255),

                Select::make('category')
                    ->label('Kategori')
                    ->options([
                        'makanan' => 'Makanan',
                        'snack' => 'Snack',
                        'souvenir' => 'Souvenir',
                        'baju' => 'Baju',
                        'minuman' => 'Minuman',
                    ])
                    ->required(),

                Hidden::make('slug')
                    ->label('Slug'),

                RichEditor::make('description')
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
                    ->label('Deskripsi')
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
                    ->directory('products/images'),
                TextInput::make('price')
                    ->label('Harga')
                    ->required()
                    ->numeric()
                    ->prefix('Rp'),
                TextInput::make('stock')
                    ->label('Stok')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ManageProducts::route('/'),
        ];
    }
}
