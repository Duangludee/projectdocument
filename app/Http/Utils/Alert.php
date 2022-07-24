<?php

namespace App\Http\Utils;

class Alert {
    public $type;
    public $title;
    public $msg;

    function __construct($type, $title, $msg)
    {
        $this->type = $type;
        $this->title = $title;
        $this->msg = $msg;
    }
}
