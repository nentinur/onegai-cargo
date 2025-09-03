@extends('admin.layout')
@section('content')
    <div class="p-5 m-5 bg-white rounded-lg shadow-lg min-h-[95vh] w-full flex flex-col">
        <h1 class="text-4xl font-bold text-main mt-5 mb-10 text-primary-dark">Dashboard</h1>

        <!-- Card Statistik -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10">
            <div class="bg-primary/10 rounded-xl p-6 flex flex-col items-center shadow">
                <div class="text-2xl font-bold text-primary-dark">{{ $stats['total_today'] }}</div>
                <div class="text-sm text-gray-600 mt-2">Total Pesanan Hari Ini</div>
            </div>
            <div class="bg-green-100 rounded-xl p-6 flex flex-col items-center shadow">
                <div class="text-2xl font-bold text-green-700">{{ $stats['sent'] }}</div>
                <div class="text-sm text-gray-600 mt-2">Pesanan Dikirim</div>
            </div>
            <div class="bg-yellow-100 rounded-xl p-6 flex flex-col items-center shadow">
                <div class="text-2xl font-bold text-yellow-700">{{ $stats['pending'] }}</div>
                <div class="text-sm text-gray-600 mt-2">Pesanan Pending</div>
            </div>
            <div class="bg-blue-100 rounded-xl p-6 flex flex-col items-center shadow">
                <div class="text-2xl font-bold text-blue-700">{{ $stats['delivered'] }}</div>
                <div class="text-sm text-gray-600 mt-2">Pesanan Selesai</div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row gap-6">
            <div class="bg-white rounded-xl shadow p-6 mb-10 w-full md:w-1/2">
                <h2 class="text-xl font-bold text-primary-dark mb-4">Pesanan 7 Hari Terakhir</h2>
                <canvas id="weeklyChart"></canvas>
            </div>
            <div class="bg-white rounded-xl shadow p-6 mb-10 w-full md:w-1/2">
                {{-- Chart lain --}}
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Gradient for weekly chart
            const weeklyCanvas = document.getElementById('weeklyChart').getContext('2d');
            const weeklyGradient = weeklyCanvas.createLinearGradient(0, 0, 0, 400);
            weeklyGradient.addColorStop(0, '#D19C66');
            weeklyGradient.addColorStop(1, '#FDE68A');

            const weeklyData = {
                labels: @json($weeklyChart['labels']),
                datasets: [{
                    label: 'Pesanan',
                    data: @json($weeklyChart['data']),
                    backgroundColor: weeklyGradient,
                    borderRadius: 8,
                    borderSkipped: false,
                    hoverBackgroundColor: '#B45309',
                    barPercentage: 0.7,
                    categoryPercentage: 0.6,
                }]
            };
            new Chart(document.getElementById('weeklyChart'), {
                type: 'bar',
                data: weeklyData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: '#D19C66',
                            titleColor: '#fff',
                            bodyColor: '#fff',
                            borderColor: '#B45309',
                            borderWidth: 1
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            },
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#FDE68A'
                            },
                        }
                    }
                }
            });
        </script>
    </div>
    </div>
@endsection
