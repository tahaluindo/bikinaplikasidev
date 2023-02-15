<?php

function toIdTime(String $date): String
{

    return date('d-M-Y, H:i:s', strtotime($date)) . " WIB";
}
