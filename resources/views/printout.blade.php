<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pembayaran</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 24px;
            color: #111;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            margin: 0 0 5px;
            font-size: 22px;
        }

        .date {
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
            vertical-align: middle;
        }

        th {
            background: #eee;
        }

        .text-center {
            text-align: center;
        }

        .status {
            font-weight: bold;
        }

        .paid {
            color: #198754;
        }

        .unpaid {
            color: #dc3545;
        }

        .other {
            color: #555;
        }

        @media print {
            body {
                padding: 0;
            }

            .no-print {
                display: none !important;
            }

            th {
                background: #eee !important;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>Detail Pembayaran</h1>
        <div class="date">Dicetak pada: {{ now()->format('d/m/Y H:i') }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th>NISN</th>
                <th>Tanggal Terakhir Bayar</th>
                <th>Batas Pembayaran SPP</th>
                <th>Status</th>
                <th class="text-center">Jumlah Bulan</th>
                <th>Nama</th>
                <th>No Telp</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($detailpembayaran as $cp)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $cp->nisn }}</td>
                    <td>{{ $cp->tgl_terakhir_bayar }}</td>
                    <td>{{ $cp->pembayaran->batas_pembayaran ?? 'N/A' }}</td>
                    <td
                        class="status {{ $cp->status_pembayaran === 'Sudah Lunas' ? 'paid' : ($cp->status_pembayaran === 'Belum Lunas' ? 'unpaid' : 'other') }}">
                        {{ $cp->status_pembayaran }}
                    </td>
                    <td class="text-center">{{ $cp->jumlah_bulan }}</td>
                    <td>{{ $cp->nama }}</td>
                    <td>{{ $cp->no_telp }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">Data pembayaran tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <script>
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</body>

</html>
