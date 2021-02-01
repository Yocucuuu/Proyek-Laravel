<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authencticable;


class administrasi extends Authencticable
{
    use SoftDeletes;

    protected $table = 'administrasi';
    protected $primaryKey = 'Id_administrasi';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable =
    ['Nama_administrasi',
    'Username_administrasi',
    'No_administrasi',
    'Alamat_administrasi',
    'Password_administrasi'
];



    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Password_admin;
    }

    public function getAuthIdentifierName()
    {
        return $this->Username_administrasi;
    }



}
