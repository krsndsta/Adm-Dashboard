<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrxKetinggianLimbahResource\Pages;
use App\Filament\Resources\TrxKetinggianLimbahResource\RelationManagers;
use App\Models\TrxKetinggianLimbah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TrxKetinggianLimbahResource extends Resource
{
    protected static ?string $model = TrxKetinggianLimbah::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nilai')
                    ->label('Ketinggian Limbah')
                    ->required()
                    ->placeholder('Masukkan Ketinggian Limbah')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('dateTime')
                    ->required()
                    ->placeholder('Masukkan Tanggal dan Waktu')
                    ->default(now()),
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('nilai')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('dateTime')
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
            'index' => Pages\ListTrxKetinggianLimbahs::route('/'),
            'create' => Pages\CreateTrxKetinggianLimbah::route('/create'),
            'edit' => Pages\EditTrxKetinggianLimbah::route('/{record}/edit'),
        ];
    }
}
