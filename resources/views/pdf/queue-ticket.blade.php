<!DOCTYPE html>
<html>

<head>
    <title>Tiket Antrian</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            border: 2px dashed #cbd5e1;
            padding: 20px;
            margin: 0;
        }

        .logo {
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 18px;
            margin: 0;
            color: #0f172a;
        }

        .header p {
            font-size: 12px;
            color: #64748b;
            margin: 5px 0;
        }

        .divider {
            border-top: 1px dashed #94a3b8;
            margin: 15px 0;
        }

        .queue-number {
            font-size: 48px;
            font-weight: bold;
            color: #2563eb;
            margin: 10px 0;
        }

        .queue-label {
            font-size: 14px;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .info-table {
            width: 100%;
            margin-top: 20px;
            text-align: left;
            font-size: 12px;
        }

        .info-table td {
            padding: 4px 0;
        }

        .info-label {
            color: #64748b;
            width: 40%;
        }

        .info-value {
            font-weight: bold;
            color: #334155;
        }

        .footer {
            margin-top: 30px;
            font-size: 10px;
            color: #94a3b8;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>PUSKESMAS AJIBARANG</h1>
        <p>Jl. Raya Pancasan No. 1, Ajibarang, Banyumas</p>
        <p>Telp: (0281) 571282</p>
    </div>

    <div class="divider"></div>

    <div class="queue-label">NOMOR ANTRIAN ANDA</div>
    <div class="queue-number">
        {{ str_pad($queue->number, 3, '0', STR_PAD_LEFT) }}
    </div>

    <div class="info-table">
        <table>
            <tr>
                <td class="info-label">Poli Tujuan</td>
                <td class="info-value">: {{ $queue->poly->name }}</td>
            </tr>
            <tr>
                <td class="info-label">Dokter</td>
                <td class="info-value">: {{ $queue->doctor->user->name ?? '-' }}</td>
            </tr>
            <tr>
                <td class="info-label">Tanggal</td>
                <td class="info-value">: {{ \Carbon\Carbon::parse($queue->date)->format('d/m/Y') }}</td>
            </tr>
            <tr>
                <td class="info-label">Pasien</td>
                <td class="info-value">: {{ $queue->patient->name }}</td>
            </tr>
        </table>
    </div>

    <div class="divider"></div>

    <div class="footer">
        <p>Silakan menunggu hingga nomor antrian Anda dipanggil.</p>
        <p>Terima kasih atas kunjungan Anda.</p>
        <p>Dicetak pada: {{ $date }} {{ $time }}</p>
    </div>
</body>

</html>