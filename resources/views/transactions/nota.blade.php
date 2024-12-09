<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Transaksi</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400;500&display=swap');

        body {
            font-family: 'Roboto', Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            color: #333;
            box-sizing: border-box;
        }

        .container {
            width: 90%;
            max-width: 800px;
            margin: 40px auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #ffd700, #ffa500);
            color: white;
            text-align: center;
            padding: 20px 0;
        }

        .header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 28px;
            margin: 0;
        }

        .header p {
            margin: 5px 0;
            font-size: 14px;
        }

        .details {
            padding: 20px;
        }

        .details h3 {
            font-family: 'Playfair Display', serif;
            color: #ffa500;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #fafafa;
            color: #333;
            font-weight: 500;
        }

        td {
            color: #555;
        }

        .total {
            padding: 20px;
            background: #fafafa;
            border-top: 1px solid #ddd;
        }

        .total p {
            font-size: 16px;
            margin: 8px 0;
        }

        .total p strong {
            font-size: 18px;
            color: #ffa500;
        }

        .footer {
            text-align: center;
            padding: 15px;
            background: #333;
            color: white;
            font-size: 12px;
        }

        .back-button {
            display: inline-block;
            text-align: center;
            margin: 20px auto;
            padding: 10px 20px;
            background: #ffa500;
            color: white;
            text-decoration: none;
            font-weight: bold;
            border-radius: 8px;
            transition: transform 0.2s, background 0.3s ease;
            box-shadow: 0 5px 10px rgba(255, 165, 0, 0.3);
        }

        .back-button:hover {
            background: #e69500;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- HEADER -->
        <div class="header">
            <h1>NOTA TRANSAKSI</h1>
            <p>No. Transaksi: {{ $transaksi->id_transaksi }}</p>
            <p>Tanggal: {{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d M Y, H:i') }}</p>
            <p>Pelanggan: {{ $transaksi->pelanggan->nama }}</p>
        </div>

        <!-- DETAIL TRANSAKSI -->
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

        <!-- TOTAL -->
        <div class="total">
            <p>Subtotal: Rp. {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>
            @if($diskon > 0)
                <p>Diskon: {{ $diskon * 100 }}%</p>
            @else
                <p>Diskon: 0%</p>
            @endif
            <p><strong>Total Bayar: Rp. {{ number_format($totalBayar, 0, ',', '.') }}</strong></p>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <p>Terima kasih telah datang😁😁</p>
            <p>&copy; 2024 Hotplate Jago - Anda Kenyang Kami Senang</p>
        </div>

        <!-- BUTTON -->
        <a href="javascript:history.back()" class="back-button">Kembali</a>
    </div>

    @if(request()->has('pdf'))
        <script>
            window.print();
        </script>
    @endif
</body>
</html>
