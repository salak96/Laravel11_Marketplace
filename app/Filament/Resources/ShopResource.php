<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ShopResource\Pages;
use App\Models\Shop;
use Doctrine\DBAL\Schema\Column;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ShopResource extends Resource
{
    protected static ?string $model = Shop::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([     
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(25),   
            Forms\Components\TextInput::make('contact')
            ->required()
            ->maxLength(15),  
                Forms\Components\FileUpload::make('banner')
            ->image(),
            Forms\Components\TextInput::make('address')
                ->maxLength(255),
                Forms\Components\FileUpload::make('logo_picture')
                ->image()
                ->required()
                ,
                Forms\Components\Textarea::make('description')
                ->required()
                ->maxLength(255),

        ]);
    
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('contact'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\ImageColumn::make('logo_picture'),
                Tables\Columns\TextColumn::make('description'),

                    
                   
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListShops::route('/'),
            'create' => Pages\CreateShop::route('/create'),
            'edit' => Pages\EditShop::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('user_id',auth()->id());
    }
    
}