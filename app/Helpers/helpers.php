<?php

use Illuminate\Support\Carbon;

function getDateFormat($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->translatedFormat('l, d F Y');
    }
}

function getDateBirthday($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->format('d-m-Y');
    }
}

function getDateFormatLDFYHIS($datetime)
{
    if (isset($datetime)) {
        return Carbon::parse($datetime)->translatedFormat('l, d F Y H:i:s');
    }
}
