<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $table = 'transaction_details';
    protected $primaryKey = 'transaction_detail_id';
    protected $fillable = [
        'transaction_id',
        'game_id',
        'quantity'
    ];
    public $timestamps = false;

    // 'TransactionDetail' belongs to 'Game'
    public function games()
    {
        return $this->belongsTo(Game::class);
    }

    // 'TransactionDetail' belongs to 'Transaction'
    public function transactions()
    {
        return $this->belongsTo(Transaction::class);
    }
}
