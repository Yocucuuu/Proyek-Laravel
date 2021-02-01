<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class membimbing extends Model
{
    use  SoftDeletes;
    protected $table = 'membimbing';
    protected $primaryKey = 'id_membimbing';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;


    public function getMapel(){
        return $this->hasOne(mapel::class,"Id_mapel","Id_mapel");
    }

}
