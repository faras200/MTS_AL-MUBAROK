<!DOCTYPE html>
<html>

    <head>
        <title>Formulir Data Siswa</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 90%;
                margin: 0 auto;
                padding: 20px;
            }

            .header {
                text-align: center;
                margin-bottom: 30px;
            }

            .header img {
                width: 100px;
            }

            .header h1 {
                font-size: 24px;
                margin: 5px 0;
            }

            .header p {
                margin: 0;
                font-size: 14px;
            }

            .form-table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            .form-table th,
            .form-table td {
                padding: 10px;
                border: 1px solid #000;
                vertical-align: top;
            }

            .photo-cell {
                text-align: center;
            }

            .photo img {
                max-width: 150px;
                max-height: 200px;
                border: none;
                display: block;
                margin: 0 auto;
            }

            .photo-name {
                font-size: 12px;
                font-weight: bold;
                text-align: center;
                margin-top: 5px;
            }


            .header .logo {
                width: 150px;
                max-width: 150px;
                /* Atur lebar maksimum */
                max-height: 200px;
                /* Atur tinggi maksimum */
                margin-top: 5px;
                border: none;
                /* Hilangkan border */
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <img class="logo" src="{{ public_path('images/logo_mts.jpg') }}" alt="Logo Sekolah">
                <h1>Formulir Data Siswa</h1>
                <p>Nomor Formulir: {{ $ppdb->id }}</p>
            </div>

            <table class="form-table">
                <tr>
                    <th width="100px">Nama Siswa</th>
                    <td>{{ $ppdb->name }}</td>
                    <td width="150px" rowspan="6" class="photo-cell">
                        <div class="photo-name">{{ $ppdb->name }}</div> <!-- Nama di atas foto -->
                        <div class="photo">
                            <img src="{{ $localImagePath }}" alt="Foto Siswa">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>No HP</th>
                    <td>{{ $ppdb->no_hp }}</td>
                </tr>
                <tr>
                    <th>NISN</th>
                    <td>{{ $ppdb->nisn }}</td>
                </tr>
                <tr>
                    <th>No KTP</th>
                    <td>{{ $ppdb->ktp }}</td>
                </tr>
                <tr>
                    <th>No KK</th>
                    <td>{{ $ppdb->kk }}</td>
                </tr>
                <tr>
                    <th>No Akte</th>
                    <td>{{ $ppdb->akte }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td colspan="2">{{ $ppdb->alamat }}</td>
                </tr>
            </table>

            <div class="footer">
                <p>Tanggal Cetak: {{ \Carbon\Carbon::now()->format('d-m-Y') }}</p>
            </div>
        </div>
    </body>

</html>
