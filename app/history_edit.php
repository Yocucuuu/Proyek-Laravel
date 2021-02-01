<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class history_edit extends Model
{

    use SoftDeletes;
    protected $table = 'history_edit';
    protected $primaryKey = 'Id_history_edit';
    protected $keyType = 'bigint';
    public $incrementing = true;
    public $timestamps = false;
    protected $fillable = ['Id_table', 'Id_pengedit', 'Tanggal_edit'];
}
