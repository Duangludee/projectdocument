<?php

namespace App\Models;

use App\Http\Globals\Constants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Handlers extends Model
{
    use HasFactory;

    protected $table = 'handlers';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getFullImagePath()
    {
        if (Storage::disk('public')->exists(Constants::$SG_PATH . 'DOC_' . $this->document_id . '/' . $this->image_name)) {
            return Storage::url(Constants::$SG_PATH . 'DOC_' . $this->document_id . '/' . $this->image_name);
        }
        return asset('assets/icons/cancel.png');
    }
}
