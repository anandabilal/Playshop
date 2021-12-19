<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = 'genres';
    protected $primaryKey = 'genre_id';
    protected $fillable = [
        'name',
        'image'
    ];
    public $timestamps = false;

    // One 'Genre' to many 'Game'
    public function games()
    {
        return $this->hasMany(Game::class);
    }
}
