<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;;
use Illuminate\Support\Str;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Resources\ProductResource\Pages;
use Filament\Forms;
use Filament\Forms\Components\Builder;
use Filament\Forms\Form;


class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['name']);
        // $data['stock'] = 10;
        $data['user_id'] = auth()->id();
        return $data;
    }


    public  function form(Form $form): Form
    {
        return $form
        ->schema([
        Forms\Components\Select::make('categories_id')//all categores
            ->relationship('category', 'name')
            ->required(),
            Forms\Components\Select::make('shop_id')
            ->relationship('shop', 'name'),
         Forms\Components\Select::make('unit_id')
           ->relationship('units', 'name'),
        Forms\Components\TextInput::make('name')
            ->required()
            ->columnSpanFull(),
            Forms\Components\TextInput::make('price')
            ->prefix('Rp')
            ->integer()
            ->required()
            ->requiredWith('field,another_field'),
            Forms\Components\TextInput::make('discount'),
            Forms\Components\RichEditor::make('description')
            ->required()
            ->requiredWithAll('field,another_field')
            ->columnSpanFull(),
            Forms\Components\FileUpload::make('image')->columnSpanFull()
                ->directory('image-product')
                ->required(),
            Forms\Components\Section::make('detail product')
            ->schema([
            Forms\Components\Repeater::make('detailProduct')
            ->relationship('detailProduct')
                         ->schema([
                            Forms\Components\FileUpload::make('name_image')->columnSpanFull()
                            ->directory('image-product_detail')
                            ->required()
                            ->columnSpan(2),
                            Forms\Components\TextInput::make('caption')
                            ->required()
                        
                        ])->columnSpanFull()

            ])->columns(2),

        ]);
    }
   

}