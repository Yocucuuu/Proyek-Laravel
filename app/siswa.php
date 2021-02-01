<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as AuthSiswa;

class siswa extends AuthSiswa
{
    use SoftDeletes;

    protected $table = 'siswa';
    protected $primaryKey = 'NIS';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable =
    [
        'Nama_siswa',
        'Password_siswa',
        'Tempat_lahir_siswa',
        'Tanggal_lahir_siswa',
        'Email_siswa',
        'Nama_ibu',
        'Nama_ayah',
        'Status',
        'NISN',
        'Agama',
        'Jenis_kelamin',
        'Alamat_siswa',
        'Id_kelas',
        'Id_jurusan',
        'Email_siswa',
    ];

  /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Password_siswa;
    }

    public function kelas()
    {
        return $this->hasOne(kelas::class,"Id_kelas","Id_kelas");
    }

    public function jurusan(){
        return $this->hasOne(jurusan::class,"Id_jurusan","Id_jurusan");
    }


}
