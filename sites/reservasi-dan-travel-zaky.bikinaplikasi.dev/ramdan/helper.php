<?php

function toIdTime(String $date): String
{

    return date('d-M-Y, H:i:s', strtotime($date)) . " WIB";
}

function toIdr(int $number, String $thousandsSeparator = ".", String $simbol = "Rp"): String
{

    return $simbol . number_format($number, 0, ",", $thousandsSeparator);
}

function fromIdr(String $idr, $simbol = "Rp"): int
{

    return preg_replace("/$simbol|\./", "", $idr);
}
