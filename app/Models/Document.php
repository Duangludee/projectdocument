<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    public function docStatus()
    {
        return $this->belongsTo(DocStatus::class, 'status', 'id');
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
}
