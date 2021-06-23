<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
      use HasFactory;
    protected $fillable=[
        'user_id','namaibu','namabapak','namaanak','tanggal','agama','alamat'
    ];
}