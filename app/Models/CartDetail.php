<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'cart_id',
        'qty',
        'harga',
        'diskon',
        'subtotal',
    ];

    public function cart() {
        return $this->belongsTo('App\Models\cart', 'cart_id');
    }

    public function produk() {
        return $this->belongsTo('App\Models\Barangs', 'produk_id');
    }

    // function untuk update qty, sama subtotal
    public function updatedetail($itemdetail, $qty, $harga, $diskon) {
        $this->attributes['qty'] = $itemdetail->qty + $qty;
        $this->attributes['subtotal'] = $itemdetail->subtotal + ($qty * ($harga - $diskon));
        self::save();
    }
}
