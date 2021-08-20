<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model{
    use HasFactory;

    protected $primaryKey = 'id_item';
    protected $table = "items";
    protected $fillable = ['id_item', 'nama_item', 'unit', 'stok', 'harga_satuan', 'gambar'];

} 