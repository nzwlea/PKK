<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'menu_id',
        'jumlah',
        'total_harga',
        'status',
        'nomor_antrian',
        'nama_pelanggan',
        'level_pedas',
        'sayur',
        'jenis_mie',
        'topping_tahu',
        'catatan',
        'status_pembayaran',
    ];

    protected function casts(): array
    {
        return [
            'jumlah' => 'integer',
            'total_harga' => 'integer',
            'topping_tahu' => 'boolean',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }
}
