<?php

function toIdTime(string $date): string
{

    return date('d-M-Y, H:i:s', strtotime($date)) . " WIB";
}

function toIdr(int $number): string
{

    return "Rp" . number_format($number, 0, ",", ".");
}

function toDateIndo($date)
{

    $date = explode('-', $date);

    $tanggal = "$date[2]-$date[1]-$date[0]";

    return $tanggal;
}
