<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <x-sidebar></x-sidebar>

        <!-- Content Area -->
        <main class="flex-1 p-8">
            <!-- Header -->
            <x-header-dashboard>Dashboard</x-header-dashboard>

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Collected -->
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                    <div class="bg-green-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a4 4 0 00-8 0v2m2 4h4m-6 0a2 2 0 014 0m-4 0a2 2 0 104 0m1 5h2m-6 0h2m-4 0h2m-4-3a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">Collected</p>
                        <p class="text-2xl font-bold">Rp {{ number_format($collected, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Total Pending -->
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                    <div class="bg-yellow-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01m-6.938 4h13.856C19.06 19.985 20 18.4 20 16.5c0-3.04-2.962-5.605-6-5.928V4a2 2 0 10-4 0v6.572c-3.038.323-6 2.888-6 5.928 0 1.9.94 3.485 2.061 4.5z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">Pending</p>
                        <p class="text-2xl font-bold">Rp {{ number_format($pending, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Total Transactions -->
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                    <div class="bg-blue-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l-4-4m0 0l4-4m-4 4h16" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">Total Transactions</p>
                        <p class="text-2xl font-bold">{{ $totalTransactions }}</p>
                    </div>
                </div>

                <!-- Total Customers -->
                <div class="bg-white p-6 rounded-lg shadow-md flex items-center space-x-4">
                    <div class="bg-purple-100 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 19a1 1 0 010-1.414l6-6a1 1 0 011.415 0l6 6A1 1 0 0117.879 19H5.121zM12 11a4 4 0 100-8 4 4 0 000 8z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-lg font-semibold">Total Customers</p>
                        <p class="text-2xl font-bold">{{ $totalCustomers }}</p>
                    </div>
                </div>
            </div>

            <!-- Grafik Penjualan Bulanan -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-lg font-semibold mb-4">Monthly Sales Report</h2>
                <canvas id="monthlySalesChart"></canvas>
            </div>
        </main>
    </div>

    <!-- Script untuk Chart.js -->
    <script>
        const ctx = document.getElementById('monthlySalesChart').getContext('2d');
        const monthlySalesData = {!! json_encode($monthlySalesData) !!}; // Data dari backend
        const monthlyLabels = Object.keys(monthlySalesData); // Ambil nama bulan
        const monthlyEarnings = Object.values(monthlySalesData); // Ambil pendapatan total

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: monthlyLabels,
                datasets: [{
                    label: 'Total Sales (Rp)',
                    data: monthlyEarnings,
                    backgroundColor: 'rgba(75, 192, 192, 0.5)', // Warna batang
                    borderColor: 'rgba(75, 192, 192, 1)', // Border batang
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: value => 'Rp ' + value.toLocaleString('id-ID')
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
