<!DOCTYPE html>
<html>
<head>
    <title>Loan Report</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <style type="text/css">
        table tr td,
        table tr th{
            font-size: 9pt;
        }
        /* UBAH WARNA: Tambahan style khusus untuk tema Navy */
        .header-blue {
            background-color: #0f172a !important;
            color: white !important;
            -webkit-print-color-adjust: exact; 
        }
        .text-navy {
            color: #0f172a;
        }
    </style>
    <center>
        <h3 class="text-navy font-weight-bold">Loan Report</h3>
    </center>
 
    <table class='table table-bordered table-striped mt-3'>
        <thead>
            <tr class="header-blue">
                <th>No</th>
                <th>Name</th>
                <th>Book title</th>
                <th>Book Code</th>
                <th>Borrow Date</th>
                <th>Mandatory Return Date</th>
                <th>Return Date</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($riwayat_peminjaman as $item )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->buku->judul }}</td>
                <td>{{ $item->buku->kode_buku }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_wajib_kembali }}</td>
                <td>{{ $item->tanggal_pengembalian }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">No Data Available</td>
            </tr>
        @endforelse
        </tbody>
    </table>
 
</body>
</html>