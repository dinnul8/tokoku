<?php

namespace App\Imports;

use App\Models\Member;
use Maatwebsite\Excel\Concerns\ToModel;

class MemberImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Member([
            'kode_member'=> $row['1'],
            'nama'=> $row['2'],
            'alamat'=> $row['3'],
            'telepon'=> $row['4'],
        ]);
    }
}
