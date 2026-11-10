<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan model ini.
     * (Opsional, karena Laravel otomatis menebak "menus"
     * dari nama model "Menu". Tapi ditulis eksplisit
     * supaya lebih jelas.)
     */
    protected $table = 'menus';

    /**
     * Kolom yang boleh diisi secara mass assignment.
     */
    protected $fillable = [
        'nama_menu',
        'harga',
        'foto',
    ];

    /**
     * Casting tipe data kolom.
     */
    protected $casts = [
        'harga' => 'integer',
    ];
}
