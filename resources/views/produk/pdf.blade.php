<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Data Customer</h1>

<table id="customers">
  <tr>
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Kategori</th>
        <th>Merk</th>
        <th>Harga Beli</th>
        <th>Harga Jual</th>
        <th>Diskon</th>
        <th>Stok</th>
    </tr>
  </tr>
  @foreach ($dataproduk as $row)
  <tr>
      <td>{{ $loop->iteration }}</td>
      <td>{{ $row->kode_produk }}</td>
      <td>{{ $row->nama_produk }}</td>
      <td>{{ $row->id_kategori}}</td>
      <td>{{ $row->merk }}</td>
      <td>{{ $row->harga_beli }}</td>
      <td>{{ $row->harga_jual }}</td>
      <td>{{ $row->diskon }}</td>
      <td>{{ $row->stok }}</td>
  </tr>
@endforeach
</table>

</body>
</html>