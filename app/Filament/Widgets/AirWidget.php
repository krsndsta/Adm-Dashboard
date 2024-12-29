<?php

namespace App\Filament\Widgets;

use App\Models\TrxPemakaianAir;
use App\Models\MJenisAir;
use Filament\Widgets\ChartWidget;

class AirWidget extends ChartWidget
{
    protected static ?string $heading = 'Pemakaian Air';

    protected function getData(): array
    {
        $categories = MJenisAir::all();

        $datasets = [];
        $labels = [];

        foreach ($categories as $kategori) {
            $data = TrxPemakaianAir::where('jenis_air_id', $kategori->id)
                ->orderBy('dateTime')
                ->take(10)
                ->get();

            if ($data->isNotEmpty()) {
                $datasets[] = [
                    'labels' => $kategori->nama, // Nama kategori sebagai label dataset
                    'data' => $data->pluck('nilai')->toArray(),
                    'borderColor' => $this->generateColor(),
                    'backgroundColor' => $this->generateColor(0.2),
                ];

                if (empty($labels)) {
                    $labels = $data->pluck('dateTime')->map(function ($date) {
                        return \Carbon\Carbon::parse($date)->format('d-m-y');
                    })->toArray();
                }
            }
        }



        return [
            //
            'datasets' => $datasets,
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function generateColor($alpha = 1.0): string
    {
        $r = rand(0, 255);
        $g = rand(0, 255);
        $b = rand(0, 255);

        return "rgba($r, $g, $b, $alpha)";
    }
}
