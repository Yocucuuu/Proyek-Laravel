<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class syarat extends Model
{
    use SoftDeletes;
    protected $table = 'syarat';
    protected $primaryKey = 'id_syarat';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
}
