<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
       use HasFactory;
        // protected $table='pembelian';
        //  protected $primaryKey = ' id ';

    protected $fillable=[
        'user_id',"nama",'alamat','jk',"no_telp",'email'
    ];
}
