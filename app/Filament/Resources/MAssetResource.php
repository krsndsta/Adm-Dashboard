<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MAssetResource\Pages;
use App\Filament\Resources\MAssetResource\RelationManagers;
use App\Models\MAsset;
use App\Models\MTipeAsset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MAssetResource extends Resource
{
    protected static ?string $model = MAsset::class;

    protected static ?string $navigationIcon = '';

    public static function getNavigationGroup(): string
    {
        return 'Master Data';
    }
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('tipe_asset_id')
                    ->required()
                    ->label('Tipe Asset ID')
                    ->options(MTipeAsset::all()->pluck('tipe_asset', 'id'))
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->searchable(),
                Tables\Columns\TextColumn::make('m_tipe_asset.tipe_asset')
                    ->label('Tipe Asset')
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
            'index' => Pages\ListMAssets::route('/'),
            'create' => Pages\CreateMAsset::route('/create'),
            'edit' => Pages\EditMAsset::route('/{record}/edit'),
        ];
    }
}
