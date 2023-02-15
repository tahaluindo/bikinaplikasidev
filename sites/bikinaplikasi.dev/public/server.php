<?php

$descriptorspec = array(
    array('pipe', 'r'),               // stdin
    array('file', 'myfile.txt', 'a'), // stdout
    array('pipe', 'w'),               // stderr
);

$proc = proc_open("java -Djava.awt.headless=true -jar whatsapp.jar", $descriptorspec, $pipes);
