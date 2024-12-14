<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrxSampahResource\Pages;
use App\Filament\Resources\TrxSampahResource\RelationManagers;
use App\Models\TrxSampah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrxSampahResource extends Resource
{
    protected static ?string $model = TrxSampah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kenaikan_sampah_organik')
                    ->required()
                    ->numeric()
                    ->rule('min:0')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $kenaikanSampahAnorganik = $get('kenaikan_sampah_anorganik');
                        $set('total_sampah', $get('kenaikan_sampah_organik') + ($kenaikanSampahAnorganik ?? 0)); // Update total_sampah
                    }),

                Forms\Components\TextInput::make('kenaikan_sampah_anorganik')
                    ->required()
                    ->numeric()
                    ->rule('min:0')
                    ->live(onBlur: true)
                    ->afterStateUpdated(function (Get $get, Set $set) {
                        $kenaikanSampahAnorganik = $get('kenaikan_sampah_anorganik');
                        $set('total_sampah', $get('kenaikan_sampah_organik') + ($kenaikanSampahAnorganik ?? 0)); // Update total_sampah
                    }),

                Forms\Components\TextInput::make('total_sampah')
                    ->required()
                    ->numeric()
                    ->disabled(),

                Forms\Components\DateTimePicker::make('dateTime')
                    ->required()
                    ->default(now()),

                Forms\Components\Hidden::make('total_sampah'), // Jika diperlukan dalam backend
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kenaikan_sampah_organik')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('kenaikan_sampah_anorganik')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_sampah')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dateTime')
                    ->dateTime()
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
            'index' => Pages\ListTrxSampahs::route('/'),
            'create' => Pages\CreateTrxSampah::route('/create'),
            'edit' => Pages\EditTrxSampah::route('/{record}/edit'),
        ];
    }
}
