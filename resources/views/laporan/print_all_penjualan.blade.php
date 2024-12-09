<!DOCTYPE html>
<html>

<head>
    <title>Laporan Semua Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f8f9fa;
            color: #333;
        }

        h2 {
            color: #FF7A00; /* Warna oranye */
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            text-align: center;
            margin-bottom: -10px;
            font-size: 14px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-top: 30px;
        }

        th {
            background-color: #FF7A00; /* Warna oranye */
            color: #fff;
            padding: 12px;
            text-align: left;
            font-size: 14px;
        }

        td {
            padding: 10px;
            font-size: 13px;
            color: #555;
        }

        th, td {
            border: 1px solid #dee2e6;
        }

        tbody tr:nth-child(odd) {
            background-color: #FFF5E6; /* Warna krem muda */
        }

        tfoot tr {
            background-color: #FF7A00; /* Warna oranye */
            color: #fff;
        }

        tfoot td {
            font-weight: bold;
            text-align: right;
            color: #fff;
            padding: 12px;
        }

        tfoot td:first-child {
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <h2>Laporan Semua Penjualan</h2>
    <p>Periode:</p>
    <p>{{ $startDate->format('d-F-Y') }} s/d {{ $endDate->format('d-F-Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>User</th>
                <th>Detail</th>
                <th>Nama Pelanggan</th>
                <th class="text-right">Total Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataPenjualan as $index => $penjualan)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $penjualan->tanggal_transaksi}}</td>
                    <td>{{ $penjualan->user->nama }}</td>
                    <td>
                        @foreach ($penjualan->detailTransaksi as $detail)
                            {{ $detail->menu->nama_menu }} ({{ $detail->jumlah_menu }} x Rp
                            {{ number_format($detail->menu->harga, 0, ',', '.') }})<br>
                        @endforeach
                    </td>
                    <td class="px-4 py-2 border-b">{{ $penjualan->pelanggan->nama ?? 'N/A' }}</td>
                    <td class="text-right">Rp
                        {{ number_format(
                            $penjualan->detailTransaksi->sum(function ($detail) {
                                return $detail->menu->harga * $detail->jumlah_menu;
                            }),
                            0,
                            ',',
                            '.'
                        ) }}
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">Total Keseluruhan</td>
                <td>Rp {{ number_format($totalKeseluruhan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>

</html>
