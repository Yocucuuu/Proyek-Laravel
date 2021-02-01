<?php

namespace App\Imports;

use App\siswa;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiswaImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //Password = NISN
        $time = strtotime($row['tanggal_lahir_siswa']);

        $newformat = date('Y-m-d',$time);
        return new siswa([
            'NISN'=> $row['nisn'],
            'Nama_siswa'=> $row['nama_siswa'],
            'Tempat_lahir_siswa'=> $row['tempat_lahir_siswa'],
            'Tanggal_lahir_siswa'=> $newformat,
            'Email_siswa'=>$row['email_siswa'],
            'Jenis_kelamin'=> $row['jenis_kelamin'],
            'Alamat_siswa'=> $row['alamat_siswa'],
            'Agama'=> $row['agama'],
            'Nama_ibu'=> $row['nama_ibu'],
            'Nama_ayah'=> $row['nama_ayah'],
            'Password_siswa' => Hash::make($row['nisn']) ,
            'id_kelas'=> $row['id_kelas'],
            'id_jurusan'=>$row['id_jurusan'],
            'Status'=>1
        ]);


    }

}
