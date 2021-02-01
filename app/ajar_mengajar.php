<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ajar_mengajar extends Model
{

    use SoftDeletes;

    protected $table = 'ajar_mengajar';
    protected $primaryKey = 'Id_ajar_mengajar';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable =
    [
     'Id_kelas',
     'Id_mapel',
     'NIG',
     'Jam_berakhir',
     'Jam_dimulai',
     'Hari',
     'Jam_belajar',
     'Status_jadwal'
    ];


    public function kelas(){
        return $this->hasOne(kelas::class,"Id_kelas","Id_kelas");
    }

    public function mapel(){
        return $this->hasOne(mapel::class,"Id_mapel","Id_mapel");
    }

    public function guru(){
        return $this->belongsTo(guru::class,"NIG","NIG");
    }


}
