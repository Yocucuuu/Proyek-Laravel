<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kelas extends Model
{
    use SoftDeletes;
    protected $table = 'kelas';
    protected $primaryKey = 'Id_kelas';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable =
    [
     'Id_periode',
     'NIG',
     'Nama_kelas',
     'Tingkat_kelas',
     'Id_jurusan'
    ];


    public function periode(){
        return $this->hasOne(periode_akademik::class,"Id_periode","Id_periode");
    }

    public function guru(){
        return $this->belongsTo(guru::class,"NIG","NIG");
    }

    public function jurusan(){
        return $this->hasOne(jurusan::class,"Id_jurusan","Id_jurusan");
    }





}
