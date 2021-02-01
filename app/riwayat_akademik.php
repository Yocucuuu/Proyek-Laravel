<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class riwayat_akademik extends Model
{
    use SoftDeletes;
    protected $table = 'riwayat_akademik';
    protected $primaryKey = 'Id_riwayat_akademik';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable =
    [
     'Id_ajar_mengajar',
     'NIS',
     'Id_kelas',
     'Id_mapel',
     'Quiz1',
     'Quiz2',
     'Tugas1',
     'Tugas2',
     'UTS',
     'UAS',
     'Sikap',
     'Hasil_akhir'
    ];

    public function kelas(){
        return $this->hasOne(kelas::class,"Id_kelas","Id_kelas");
    }

    public function  mapel(){
        return $this->hasOne(mapel::class,"Id_mapel","Id_mapel");
    }

    public function siswa(){
        return $this->belongsTo(siswa::class,"NIS","NIS");
    }

    public function ajar(){
        return $this->hasOne(ajar_mengajar::class,"Id_ajar_mengajar","Id_ajar_mengajar");
    }

}
