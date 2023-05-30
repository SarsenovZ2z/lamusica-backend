<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    use HasFactory;

    protected $table = 'audios';

    protected $fillable = [
        'name', 'source', 'source_id',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class);
    }

}