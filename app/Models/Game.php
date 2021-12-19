<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';
    protected $primaryKey = 'game_id';
    protected $fillable = [
        'genre_id',
        'name',
        'price',
        'description',
        'image'
    ];
    public $timestamps = false;

    // 'Game' belongs to 'Genre'
    public function genres()
    {
        return $this->belongsTo(Genre::class);
    }

    // One 'Game' to many 'TransactionDetail'
    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class);
    }

    // One 'Game' to many 'Cart'
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
