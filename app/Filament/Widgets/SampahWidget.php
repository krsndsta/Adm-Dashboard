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
            ->orderByDesc('dateTime')
            ->take(10);

        return [
            'datasets' => [
                [
                    'label' => 'Sampah Organik',
                    'data'  => $data->pluck('kenaikan_sampah_organik')->toArray()
                ],
                [
                    'label' => 'Sampah Anorganik',
                    'data'  => $data->pluck('kenaikan_sampah_anorganik')->toArray()
                ],
            ],
            'labels' => $data->pluck('dateTime')->toArray()
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
