<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticable;


class guru extends Authenticable
{

    use  SoftDeletes;
    protected $table = 'guru';
    protected $primaryKey = 'NIG';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable =
    [
     'Nama_guru',
     'Password_guru',
     'No_hp_guru',
     'Alamat_guru',
     'Status_guru'
    ];


   /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->Password_guru;
    }

    public function kelas(){
        return $this->hasMany(kelas::class,'NIG','NIG');
    }

    public function membimbing(){
        return $this->hasMany(membimbing::class,"NIG","NIG");
    }
    public function ajar(){
        return $this->hasMany(ajar_mengajar::class,"NIG","NIG");
    }


    public function mapel(){
        return $this->belongsToMany(mapel::class,'membimbing','NIG','Id_mapel');
            // ->withPivot('tb_id','tb_stok')//kenalkan tb_stok sebag/ai column pada tabel pivot
            ;
    }


}
