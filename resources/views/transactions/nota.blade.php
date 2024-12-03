<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .header p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        .details {
            margin-bottom: 20px;
        }
        .details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }
        .details th, .details td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        .details th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
        .total p {
            font-size: 16px;
            font-weight: bold;
            margin: 5px 0;
        }
        .footer {
            text-align: center;
            font-size: 12px;
            color: #aaa;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>NOTA TRANSAKSI</h1>
            <p>No. Transaksi: {{ $transaksi->id_transaksi }}</p>
            <p>Tanggal: {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y, H:i') }}</p>
            <p>Pelanggan: {{ $transaksi->pelanggan->nama }}</p>
        </div>

        <div class="details">
            <h3>Detail Transaksi</h3>
            <table>
                <thead>
                    <tr>
                        <th>Menu</th>
                        <th>Jumlah</th>
                        <th>Harga per Item</th>
                        <th>Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi->detailTransaksi as $detail)
                        <tr>
                            <td>{{ $detail->menu->nama_menu }}</td>
                            <td>{{ $detail->jumlah_menu }}</td>
                            <td>Rp. {{ number_format($detail->menu->harga, 0, ',', '.') }}</td>
                            <td>Rp. {{ number_format($detail->jumlah_menu * $detail->menu->harga, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="total">
            <p>Subtotal: Rp. {{ number_format($subtotal, 0, ',', '.') }}</p>
            @if($diskon > 0)
                <p>Diskon: {{ $diskon * 100 }}%</p>
            @elseif($diskon == 0)
                <p>Diskon: 0%</p>
            @elseif($diskon == 1)
                <p>Diskon: 100%</p>
            @endif
            <p><strong>Total Bayar: Rp. {{ number_format($totalBayar, 0, ',', '.') }}</strong></p>
        </div>

        <div class="footer">
            <p>Terima kasih telah berbelanja di toko kami!</p>
            <p>&copy; 2024 Toko XYZ</p>
        </div>

          <!-- Tombol Kembali -->
          <a href="javascript:history.back()" class="back-button">Kembali</a>
    </div>

    @if(request()->has('pdf'))
        <script>
            window.print();
        </script>
    @endif
</body>
</html>
