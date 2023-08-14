<?php

namespace App\Imports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\ToModel;

class ProdukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Produk([
            'id_kategori'=> $row['1'],
            'kode_produk'=> $row['2'],
            'nama_produk'=> $row['3'],
            'merk'=> $row['4'],
            'harga_beli'=> $row['5'],
            'diskon'=> $row['6'],
            'harga_jual'=> $row['7'],
            'stok'=> $row['8']
        ]);
    }
}
