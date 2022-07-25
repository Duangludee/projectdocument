<?php

namespace App\Models;

use App\Http\Globals\Constants;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{
    use HasFactory;

    public function docStatus()
    {
        return $this->belongsTo(DocStatus::class, 'status', 'id');
    }

    public function handlers()
    {
        return $this->hasMany(Handlers::class, 'document_id', 'id');
    }

    public function dateInToThai()
    {
        if (isset($this->date_in)) {
            return Carbon::parse($this->date_in)->format('d/m/Y');
        }
        return "";
    }

    public function dateOutToThai()
    {
        if (isset($this->date_in)) {
            return Carbon::parse($this->date_out)->format('d/m/Y');
        }
        return "";
    }

    public function getDocImage()
    {
        if (Storage::disk('public')->exists(Constants::$DOC_PATH . $this->file)) {
            return Storage::url(Constants::$DOC_PATH . $this->file);
        }
        return asset('assets/icons/cancel.png');
    }
}
