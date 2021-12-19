<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected $primaryKey = 'transaction_id';
    protected $fillable = [
        'user_id',
        'transaction_date'
    ];
    public $timestamps = false;

    // 'Transaction' belongs to 'User'
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    // One 'Transaction' to many 'TransactionDetail'
    public function transaction_details()
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
