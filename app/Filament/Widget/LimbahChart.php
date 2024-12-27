<?php

namespace App\Filament\Widgets;

use App\Filament\Widgets\LineChartWidget;
use App\Models\TrxKetinggianLimbah;

class LimbahChart extends LineChartWidget
{
    protected static ?string $heading = 'Ketinggian Limbah';

    protected function getData(): array
    {
        $data = TrxKetinggianLimbah::select('dateTime', 'nilai')
            ->orderBy('dateTime', 'asc')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Ketinggian Limbah',
                    'data' => $data->pluck('nilai')->toArray(),
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $data->pluck('dateTime')->toArray(),
        ];
    }
}
