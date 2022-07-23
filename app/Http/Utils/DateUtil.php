<?php

namespace App\Http\Utils;

use Carbon\Carbon;

class DateUtil {
    static  function dateToDB($date)
    {
        return Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d');
    }
}
