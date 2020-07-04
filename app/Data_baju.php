<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_baju extends Model
{
    protected $fillable = [
        'category_id',
        'nama_baju',
        'harga_baju',
        'stock',
        'gambar',
    ];

    protected $appends = [
        'harga_baju_format'
    ];

    public function getHargaBajuFormatAttribute()
    {
        return 'Rp '.number_format($this->harga_baju);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
