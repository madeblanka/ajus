<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pinjaman Ruangan </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		<h5>Laporan Pinjaman Ruangan</h4>
	</center>

	<table class='table table-bordered'>
		<thead>
        <tr>
                      <th>ID Barang</th>
                      <th>ID Ruangan</th>
                      <th>ID User</th>
                      <th>Tanggal Pengajuan</th>
                      <th>Tanggal Pinjaman</th>
                      <th>Tanggal Selesai</th>
                      <th>Deskripsi</th>
                      <th>Status</th>
                    </tr>
		</thead>
		<tbody>
            @foreach($tb_jadwal as $r)
                            <tr>
                                <td>{{ $r->id_barang }}</td>
                                <td>{{ $r->id_ruangan }}</td>
                                <td>{{ $r->id_user }}</td>
                                <td>{{ $r->tanggalpengajuan }}</td>
                                <td>{{ $r->tanggalpinjaman }}</td>
                                <td>{{ $r->tanggalselesai }}</td>
                                <td>{{ $r->deskripsi }}</td>
                                <td>{{ $r->status }}</td>
                            </tr>
                        @endforeach
		</tbody>
	</table>

</body>
</html>