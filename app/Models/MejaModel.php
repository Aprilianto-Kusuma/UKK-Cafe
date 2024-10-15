<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MejaModel extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan default plural
    protected $table = 'meja';

    // Tentukan primary key jika bukan 'id'
    protected $primaryKey = 'id_meja';

    // Tentukan kolom yang dapat diisi secara massal
    protected $fillable = ['nomor_meja'];
}
