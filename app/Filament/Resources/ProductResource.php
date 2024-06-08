<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
            Forms\Components\TextInput::make('name')
            ->required(),
            Forms\Components\Select::make('categories_id')//all categores
            ->relationship('category', 'name')
            ->required(),
            Forms\Components\Select::make('shop_id')
            ->relationship('shops', 'name',
                modifyQueryUsing:fn(Builder $query)=>
                $query->where('user_id',auth()->id()))
                ->columnSpan(2)
                ,
            // Forms\Components\Select::make('unit_id')
            // ->relationship('units', 'name')
            // ->required(),   
            Forms\Components\TextInput::make('price')
            ->prefix('Rp')
            ->integer()
            ->required()
            ->requiredWith('field,another_field'),
            Forms\Components\TextInput::make('Discount')
            ->prefix('Rp')
            ->integer()
            ->required()
            ->requiredWith('field,another_field'),
            Forms\Components\RichEditor::make('description')
            ->required()
            ->requiredWithAll('field,another_field')
            ->columnSpanFull(),
            Forms\Components\FileUpload::make('image')->columnSpanFull()
                ->directory('image-product')
                ->required(),
            Forms\Components\Section::make('detail product')
            ->schema([
            // Forms\Components\Repeater::make('detailProduct')
            // ->relationship('detailProduct')
            //              ->schema([
            //                 Forms\Components\FileUpload::make('name_image')->columnSpanFull()
            //                 ->directory('image-product_detail')
            //                 ->required()
            //                 ->columnSpan(2),
            //                 Forms\Components\TextInput::make('caption')
            //                 ->required()
                        
            //             ])->columnSpanFull()

            ])->columns(2),


        ]); 
        
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
            ->searchable(),
        Tables\Columns\TextColumn::make('slug'),
        Tables\Columns\TextColumn::make('category.name')
            ->label('Category Product'),
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

    //filter tabel shope
    public static function getEloquentQuery(): Builder
    {
    return parent::getEloquentQuery()->whereHas('shops', function ($query) {
        $query->where('user_id', auth()->id());
    });
    }
}        
     