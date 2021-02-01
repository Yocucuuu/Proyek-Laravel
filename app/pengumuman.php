<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class pengumuman extends Model
{


    use SoftDeletes;
    protected $table = 'pengumuman';
    protected $primaryKey = 'Id_pengumuman';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Judul_pengumuman', 'Tanggal_pengumuman', 'File_pengumuman','Id_administrasi'];
}
