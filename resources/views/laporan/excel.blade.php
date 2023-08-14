<table id="categories" width="100%">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Tanggal</th>
            <th>Penjualan</th>
            <th>Pembelian</th>
            <th>Pengeluaran</th>
            <th>Pendapatan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $row)
            <tr>
                @foreach ($row as $col)
                    <td>{{ $col }}</td>
                @endforeach
            </tr>
        @endforeach
    </tbody>

</table>