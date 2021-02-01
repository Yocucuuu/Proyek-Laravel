<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mapel extends Model
{
    use SoftDeletes;
    protected $table = 'mapel';
    protected $primaryKey = 'Id_mapel';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Nama_mapel', 'KKM', 'Tingkat', 'Id_jurusan'];

}
