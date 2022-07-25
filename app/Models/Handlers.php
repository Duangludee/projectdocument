<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handlers extends Model
{
    use HasFactory;

    protected $table = 'handlers';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
