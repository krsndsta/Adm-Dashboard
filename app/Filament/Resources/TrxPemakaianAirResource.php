<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrxPemakaianAirResource\Pages;
use App\Filament\Resources\TrxPemakaianAirResource\RelationManagers;
use App\Models\MJenisAir;
use App\Models\TrxPemakaianAir;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrxPemakaianAirResource extends Resource
{
    protected static ?string $model = TrxPemakaianAir::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('jenis_air_id')
                    ->required()
                    ->label('Jenis Air')
                    ->options(MJenisAir::all()->pluck('nama', 'id')),
                Forms\Components\TextInput::make('nilai')
                    ->required()
                    ->numeric(),
                Forms\Components\DateTimePicker::make('dateTime')
                    ->required()
                    ->default(now()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('m_jenis_air.nama')->label('Jenis Air')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nilai')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dateTime')->label('Tanggal')
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
            'index' => Pages\ListTrxPemakaianAirs::route('/'),
            'create' => Pages\CreateTrxPemakaianAir::route('/create'),
            'edit' => Pages\EditTrxPemakaianAir::route('/{record}/edit'),
        ];
    }
}
