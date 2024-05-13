<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Product';
    protected static ?string $navigationLabel = 'Product';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
        Forms\Components\Select::make('category_id')//all categores
            ->relationship('category', 'name')
            ->required()
        ,

        Forms\Components\Section::make('Product')
            ->schema([
            Forms\Components\TextInput::make('name')
                ->required()
                ->columnSpanFull(),

            Forms\Components\TextInput::make('price')
            ->prefix('Rp')
            ->required()
            ->requiredWith('field,another_field'),
            Forms\Components\TextInput::make('discount'),
            Forms\Components\RichEditor::make('description')
            ->required()
            ->requiredWithAll('field,another_field')
            ->columnSpanFull(),
            Forms\Components\FileUpload::make('image')->columnSpanFull()
                ->directory('image-product')
                ->required()
                ,

            ])->columns(2)
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('slug'),
            Tables\Columns\TextColumn::make('category.name'),
            Tables\Columns\ImageColumn::make('image'),

        ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make('Delete'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),

                ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}