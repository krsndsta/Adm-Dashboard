<?php

namespace App\Filament\Widgets;

use App\Models\TrxAsset;
use Filament\Widgets\ChartWidget;

class AssetTidakBergerakWidget extends ChartWidget
{
    protected static ?string $heading = 'Asset Tidak Bergerak';

    protected function getData(): array
    {
        $data = TrxAsset::where('jenis_pemantauan', 'TIDAK_BERGERAK')
            ->orderBy('dateTime')
            ->take(10)->get();

        $labels = $data->pluck('dateTime')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d-m-y');
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Baik',
                    'data'  => $data->pluck('jumlah_baik')->toArray(),
                    'color' => 'primary',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ],
                [
                    'label' => 'Jumlah Baik',
                    'data'  => $data->pluck('jumlah_kurang_baik')->toArray(),
                    'color' => 'danger',
                    'borderColor' => 'rgba(255, 99, 132, 1)',
                    'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
