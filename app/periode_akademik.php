<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class periode_akademik extends Model
{
    use SoftDeletes;
    protected $table = 'periode_akademik';
    protected $primaryKey = 'Id_periode';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Tahun_ajaran', 'Semester', 'Status'];
}
