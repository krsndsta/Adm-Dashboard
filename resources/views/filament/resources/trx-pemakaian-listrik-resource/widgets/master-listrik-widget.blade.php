<x-filament-widgets::widget>
    <x-filament::section>

        <div>
            @foreach ($this->getChartsData() as $chart)
                <div class="my-4">
                    <h3>{{ $chart['label'] }}</h3>
                    <canvas id="chart-{{ $chart['id'] }}"></canvas>
                </div>
                @push('scripts')
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        const ctx{{ $chart['id'] }} = document.getElementById('chart-{{ $chart['id'] }}').getContext('2d');
                        new Chart(ctx{{ $chart['id'] }}, {
                            type: 'line',
                            data: {
                                datasets: [{
                                    label: '{{ $chart['label'] }}',
                                    data: @json($chart['data']),
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    tension: 0.4,
                                }],
                            },
                            options: {
                                scales: {
                                    x: {
                                        type: 'time',
                                        time: {
                                            unit: 'day'
                                        },
                                        title: {
                                            display: true,
                                            text: 'Tanggal'
                                        }
                                    },
                                    y: {
                                        title: {
                                            display: true,
                                            text: 'Pemakaian'
                                        }
                                    }
                                }
                            }
                        });
                    </script>
                @endpush
            @endforeach
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
