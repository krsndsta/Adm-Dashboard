<?php

namespace App\Filament\Widgets;

use App\Models\TrxPemakaianListrik;
use App\Models\MJenisListrik;
use Filament\Widgets\ChartWidget;

class ListrikWidget extends ChartWidget
{
    protected static ?string $heading = 'Pemakaian Listrik';

    protected function getData(): array
    {
        // Ambil semua kategori listrik dari tabel m_jenis_listrik
        $categories = MJenisListrik::all();

        $datasets = [];
        $labels = []; // Untuk label waktu (dateTime)

        // Iterasi untuk setiap kategori listrik
        foreach ($categories as $category) {
            // Ambil data dari TrxPemakaianListrik berdasarkan jenis listrik
            $data = TrxPemakaianListrik::where('jenis_listrik_id', $category->id)
                ->orderBy('dateTime', 'asc') // Urutkan berdasarkan waktu
                ->take(10)
                ->get();

            // Jika data ada, tambahkan ke datasets
            if ($data->isNotEmpty()) {
                $datasets[] = [
                    'labels' => $category->nama, // Nama kategori sebagai label dataset
                    'data' => $data->pluck('nilai')->toArray(),
                    'borderColor' => $this->generateColor(),
                    'backgroundColor' => $this->generateColor(0.2),
                ];

                // Ambil label waktu (hanya sekali karena semua kategori punya waktu yang sama)
                if (empty($labels)) {
                    $labels = $data->pluck('dateTime')->map(function ($date) {
                        return \Carbon\Carbon::parse($date)->format('d-m-y');
                    })->toArray();
                }
            }
        }

        return [
            'datasets' => $datasets, // Data untuk setiap kategori
            'labels' => $labels,     // Label waktu pada X-Axis
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Anda bisa mengganti menjadi 'bar' atau jenis lain sesuai kebutuhan
    }

    // Fungsi untuk menghasilkan warna acak
    protected function generateColor($alpha = 1.0): string
    {
        $r = rand(0, 255);
        $g = rand(0, 255);
        $b = rand(0, 255);

        return "rgba($r, $g, $b, $alpha)";
    }
}
