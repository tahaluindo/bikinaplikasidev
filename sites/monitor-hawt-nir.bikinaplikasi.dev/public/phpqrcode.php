<?php

include __DIR__ . "/../phpqrcode/phpqrcode.php";

qrcode::png($_GET['data']);