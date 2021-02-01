<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class jurusan extends Model
{
    use SoftDeletes;
    protected $table = 'jurusan';
    protected $primaryKey = 'Id_jurusan';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
}
