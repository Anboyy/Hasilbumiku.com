<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = ['nama_barang','harga','jenis_barang','deskripsi','image','penjual','quantity'];
    protected $guarded = ['id'];
}
