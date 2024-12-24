<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrxAssetResource\Pages;
use App\Models\MAsset;
use App\Models\TrxAsset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TrxAssetResource extends Resource
{
    protected static ?string $model = TrxAsset::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\DateTimePicker::make('dateTime')
                    ->required()
                    ->default(now()),

                Forms\Components\Select::make('jenis_pemantauan')
                    ->label('Jenis Pemantauan')
                    ->options([
                        'BERGERAK' => 'Bergerak',
                        'TIDAK_BERGERAK' => 'Tidak Bergerak',
                    ])
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, Set $set, Get $get) {
                        if ($state == 'BERGERAK') {
                            $set('assets', MAsset::where('tipe_asset_id', 1)->get());
                        } elseif ($state == 'TIDAK_BERGERAK') {
                            $set('assets', MAsset::where('tipe_asset_id', 2)->get());
                        } else {
                            $set('assets', []);
                        }
                    }),

                Forms\Components\Fieldset::make('assets')
                    ->label('Daftar Asset')
                    ->schema(function (callable $get) {
                        $assets = $get('assets');

                        if (!$assets) return [];

                        return $assets->map(function ($asset) {
                            return Forms\Components\Fieldset::make($asset->nama)
                                ->schema([
                                    Forms\Components\Hidden::make("assets[{$asset->id}][id]")
                                        ->default($asset->id),

                                    Forms\Components\Radio::make("assets[{$asset->id}][status]")
                                        ->options([
                                            'BAIK' => 'Baik',
                                            'KURANG_BAIK' => 'Kurang Baik',
                                        ])
                                        ->required()
                                        ->reactive()
                                        ->hiddenLabel()
                                        ->afterStateUpdated(function (Get $get, Set $set) use ($asset) {
                                            $assets = $get('assets') ?? [];

                                            // Cari asset berdasarkan ID dan ambil kondisi sebelumnya
                                            $currentAsset = collect($assets)->firstWhere('id', $asset->id);
                                            $currentKondisi = $currentAsset['status'] ?? null; // Ambil kondisi sebelumnya

                                            // Ambil kondisi baru dari form
                                            $newKondisi = $get("assets[{$asset->id}][status]");

                                            $jumlahBaik = $get('jumlah_baik') ?? 0;
                                            $jumlahKurangBaik = $get('jumlah_kurang_baik') ?? 0;

                                            // Update jumlah baik dan kurang baik
                                            if ($currentKondisi === 'BAIK') {
                                                $jumlahBaik -= 1;
                                            } elseif ($currentKondisi === 'KURANG_BAIK') {
                                                $jumlahKurangBaik -= 1;
                                            }

                                            if ($newKondisi === 'BAIK') {
                                                $jumlahBaik += 1;
                                            } elseif ($newKondisi === 'KURANG_BAIK') {
                                                $jumlahKurangBaik += 1;
                                            }

                                            // Update jumlah kondisi
                                            $set('jumlah_baik', $jumlahBaik);
                                            $set('jumlah_kurang_baik', $jumlahKurangBaik);

                                            // Update status asset yang sesuai
                                            foreach ($assets as $key => $assetData) {
                                                if ($assetData['id'] === $asset->id) {
                                                    $assets[$key]['status'] = $newKondisi;
                                                }
                                            }

                                            // Set kembali data assets setelah status diperbarui
                                            $set('assets', $assets);
                                            // dd($get('assets'));
                                        })
                                ]);
                        })->toArray();
                    })
                    ->columnSpan('full')
                    ->visible(fn($get) => in_array($get('jenis_pemantauan'), ['BERGERAK', 'TIDAK_BERGERAK'])),

                Forms\Components\TextInput::make('jumlah_baik')
                    ->label('Jumlah Baik')
                    ->default(0)
                    ->disabled(), // Disabled karena ini akan dihitung berdasarkan status asset

                Forms\Components\TextInput::make('jumlah_kurang_baik')
                    ->label('Jumlah Kurang Baik')
                    ->default(0)
                    ->disabled(), // Disabled karena ini akan dihitung berdasarkan status asset

                Forms\Components\Hidden::make("jumlah_kurang_baik"),
                Forms\Components\Hidden::make("jumlah_baik"),
            ]);
    }



    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('jenis_pemantauan'),
                Tables\Columns\TextColumn::make('jumlah_baik')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jumlah_kurang_baik')
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
            'index' => Pages\ListTrxAssets::route('/'),
            'create' => Pages\CreateTrxAsset::route('/create'),
            'edit' => Pages\EditTrxAsset::route('/{record}/edit'),
        ];
    }
}
