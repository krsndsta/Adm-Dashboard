<?php

namespace App\Filament\Widgets;

use App\Models\TrxKetinggianLimbah;
use Filament\Widgets\ChartWidget;

class LimbahWidget extends ChartWidget
{
    protected static ?string $heading = 'Ketinggian Limbah';

    protected function getData(): array
    {
        // Ambil data dari model dan urutkan
        $data = TrxKetinggianLimbah::select(['id', 'dateTime', 'nilai'])
            ->orderBy('dateTime') // Urutkan berdasarkan waktu terbaru
            ->take(10) // Ambil 10 data terbaru
            ->get(); // Jangan lupa tambahkan ->get() untuk mengambil data dari database

        // Format dateTime menjadi format dd-mm-yy
        $labels = $data->pluck('dateTime')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('d-m-y');
        })->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Ketinggian Limbah (cm)',
                    'data' => $data->pluck('nilai')->toArray(),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ],
            ],
            'labels' => $labels, // Gunakan label yang sudah diformat
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
