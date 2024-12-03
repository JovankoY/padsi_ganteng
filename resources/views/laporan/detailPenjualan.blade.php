<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: #fff5e1;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background: #ffffff;
            width: 750px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        /* Header Section */
        .header {
            background: #f59e0b;
            color: #f5f5f5;
            text-align: center;
            padding: 20px;
        }

        .header img {
            width: 70px;
            margin-bottom: 10px;
        }

        .header h1 {
            font-size: 26px;
            font-weight: 600;
            margin: 10px 0;
        }

        .header p {
            font-size: 14px;
            font-weight: 300;
            margin: 0;
        }

        /* Transaction Info Section */
        .transaction-info {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background: #fff3cd;
        }

        .transaction-info div {
            font-size: 14px;
        }

        .transaction-info span {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        /* Table Section */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
        }

        th {
            background: #f59e0b;
            color: #ffffff;
            text-transform: uppercase;
            font-size: 14px;
        }

        td {
            background: #fff8e6;
            font-size: 14px;
            border-bottom: 1px solid #ffeb3b;
        }

        /* Totals Section */
        .totals {
            padding: 20px;
            background: #fff3cd;
        }

        .totals div {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .totals .total {
            font-size: 18px;
            font-weight: 600;
            color: #020617;
        }

        /* Footer Section */
        .footer {
            text-align: center;
            padding: 20px;
            background: #f59e0b;
            color: #f5f5f5;
            font-size: 14px;
        }

        /* Buttons */
        .button-group {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background: #ffffff;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
        }

        .button.print {
            background: #3b82f6;
        }

        .button.print:hover {
            background: #0369a1;
        }

        .button.back {
            background: #d50000;
        }

        .button.back:hover {
            background: #b71c1c;
        }

        @media print {
            .button-group {
                display: none;
            }

            body {
                background-color: white;
            }

            .container {
                box-shadow: none;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <img src="{{ asset('images/hotplatelogo.png') }}" alt="Logo Restoran" style="width: 300px; height: auto;">
            <h1>Nota Transaksi</h1>
            <p>Jl. Selokan Mataram, Yogyakarta | Telp: 021-12345678</p>
        </div>

        <!-- Transaction Info -->
        <div class="transaction-info">
            <div>
                <span>No. Transaksi:</span> {{ $laporanPenjualan->id_transaksi }}
                <span>Tanggal:</span> {{ $laporanPenjualan->tanggal_transaksi->format('d-m-Y H:i') }}
            </div>
            <div>
                <span>Pelanggan:</span> {{ $laporanPenjualan->pelanggan->nama ?? 'Tidak Ada' }}
            </div>
        </div>

        <!-- Table -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Menu</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @php
                $grandTotal = 0; // Variabel untuk menghitung total keseluruhan
                @endphp

                @foreach ($laporanPenjualan->detailTransaksi as $key => $detail)
                @php
                $totalHargaPerMenu = $detail->menu->harga * $detail->jumlah_menu;
                $grandTotal += $totalHargaPerMenu; // Tambahkan total harga per menu ke grand total
                @endphp

                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $detail->menu->nama_menu }}</td>
                    <td>{{ $detail->jumlah_menu }}</td>
                    <td>Rp {{ number_format($detail->menu->harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($totalHargaPerMenu, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Totals -->
        <div class="totals">
            <div>
                <span>Total Bayar:</span>
                <span class="total">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
            </div>
        </div>

        <!-- Buttons -->
        <div class="button-group">
            <a href="{{ route('laporan.index') }}" class="button back">Kembali</a>
            <button class="button print" onclick="window.print()">Cetak Nota</button>
        </div>

        <!-- Footer -->
        <div class="footer">
            Terima kasih telah berkunjung ke Restoran Kami. Sampai jumpa lagi!
        </div>
    </div>
</body>

</html>
