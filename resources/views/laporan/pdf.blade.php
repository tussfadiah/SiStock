<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Barang</title>

    <style>
        body{
            font-family: DejaVu Sans, sans-serif;
            font-size:12px;
            margin:25px;
        }

        h2{
            text-align:center;
            margin-bottom:5px;
        }

        p{
            text-align:center;
            margin-top:0;
            margin-bottom:20px;
            color:#555;
        }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th{
            background:#1e3a8a;
            color:white;
            border:1px solid black;
            padding:8px;
        }

        td{
            border:1px solid black;
            padding:8px;
            text-align:center;
        }

        .footer{
            margin-top:30px;
            text-align:right;
            font-size:11px;
            color:#555;
        }
    </style>

</head>

<body>

    <h2>LAPORAN DATA BARANG</h2>

    <p>
        Sistem Inventaris Barang (SiStock)
    </p>

    <table>

        <thead>

            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Merk</th>
                <th>Foto</th>
                <th>Lokasi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($barang as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_barang }}</td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>{{ $item->merk }}</td>
                    <td>
    @if($item->foto)
        <img 
            src="{{ public_path('storage/' . $item->foto) }}"
            style="width:50px; height:50px; object-fit:cover;"
        >
    @else
        Tidak ada foto
    @endif
</td>
                    <td>{{ $item->lokasi }}</td>

                </tr>

            @empty

                <tr>
                    <td colspan="7">Tidak ada data barang.</td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <div class="footer">
        Dicetak pada :
        {{ \Carbon\Carbon::now()->translatedFormat('d F Y H:i') }}
    </div>

</body>

</html>