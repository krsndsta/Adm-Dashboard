<?php

namespace App\Filament\Widgets;

use App\Models\TrxSampah;
use Filament\Widgets\ChartWidget;

class SampahWidget extends ChartWidget
{
    protected static ?string $heading = 'Ketinggian Sampah';

    protected function getData(): array
    {
        $data = TrxSampah::select(['id', 'kenaikan_sampah_organik', 'kenaikan_sampah_anorganik', 'total_sampah', 'dateTime'])
            ->orderBy('dateTime')
            ->take(10);

        $labels = $data->pluck('dateTime')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d-m-y');
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Sampah Organik',
                    'data'  => $data->pluck('kenaikan_sampah_organik')->toArray(),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ],
                [
                    'label' => 'Sampah Anorganik',
                    'data'  => $data->pluck('kenaikan_sampah_anorganik')->toArray(),
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
