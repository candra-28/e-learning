<?php

use Illuminate\Support\Carbon;

function getDateFormat($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->translatedFormat('l, d F Y');
    }
}
