<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Akun extends Model
{
    protected $table = 'akun';
    protected $fillable = ['id_akun', 'kode_akun', 'jenis_akun', 'bagian_akun'];
    
    public $incrementing = false;

}
