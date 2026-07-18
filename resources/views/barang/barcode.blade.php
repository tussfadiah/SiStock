<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Barcode Barang</title>

    <style>

        body{
            font-family: Arial, Helvetica, sans-serif;
            text-align:center;
            margin:30px;
        }

        .card{
            width:500px;
            margin:auto;
            border:2px solid #000;
            padding:20px;
            border-radius:10px;
        }

        h1{
            margin-bottom:5px;
        }

        h2{
            margin-top:0;
            color:#0B2F64;
        }

        .barcode{
            margin:20px 0;
        }

        table{
            width:100%;
            margin-top:15px;
            border-collapse:collapse;
        }

        td{
            padding:8px;
            border:1px solid #ddd;
            text-align:left;
        }

        .btn{
            margin-top:20px;
            padding:10px 25px;
            background:#0B2F64;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        @media print{

            .btn{
                display:none;
            }

            body{
                margin:0;
            }

            .card{
                border:none;
                width:100%;
            }

        }

    </style>

</head>
<body>

<div class="card">

    <h1>SiStock TVRI Sumsel</h1>

    <hr>

    <h2>{{ $barang->nama_barang }}</h2>

    <table>

        <tr>
            <td><b>Kode Barang</b></td>
            <td>{{ $barang->kode_barang }}</td>
        </tr>

        <tr>
            <td><b>Kategori</b></td>
            <td>{{ $barang->kategori }}</td>
        </tr>

        <tr>
            <td><b>Merk</b></td>
            <td>{{ $barang->merk }}</td>
        </tr>

        <tr>
            <td><b>Lokasi</b></td>
            <td>{{ $barang->lokasi }}</td>
        </tr>

    </table>

    <div class="barcode">
<img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($barang->kode_barang, 'C128') }}">
    </div>

    <button class="btn" onclick="history.back()">
    Batal
</button>

    <button class="btn" onclick="window.print()">
        Cetak Barcode
    </button>

</div>

</body>
</html>