<?php

return [
    'exception_message' => 'Virheilmoitus: :message',
    'exception_trace' => 'Virhe, jäljitys: :trace',
    'exception_message_title' => 'Virheilmoitus',
    'exception_trace_title' => 'Virheen jäljitys',

    'backup_failed_subject' => ':application_name varmuusmakanan & minumanointi epäonnistui',
    'backup_failed_body' => 'HUOM!: :application_name varmuuskoipionnissa tapahtui virhe',

    'backup_successful_subject' => ':application_name varmuusmakanan & minumanoitu onnistuneesti',
    'backup_successful_subject_title' => 'Uusi varmuusmakanan & minumano!',
    'backup_successful_body' => 'Hyviä uutisia! :application_name on varmuusmakanan & minumanoitu levylle :disk_name.',

    'cleanup_failed_subject' => ':application_name varmuusmakanan & minumanoiden poistaminen epäonnistui.',
    'cleanup_failed_body' => ':application_name varmuusmakanan & minumanoiden poistamisessa tapahtui virhe.',

    'cleanup_successful_subject' => ':application_name varmuusmakanan & minumanot poistettu onnistuneesti',
    'cleanup_successful_subject_title' => 'Varmuusmakanan & minumanot poistettu onnistuneesti!',
    'cleanup_successful_body' => ':application_name varmuusmakanan & minumanot poistettu onnistuneesti levyltä :disk_name.',

    'healthy_backup_found_subject' => ':application_name varmuusmakanan & minumanot levyllä :disk_name ovat kunnossa',
    'healthy_backup_found_subject_title' => ':application_name varmuusmakanan & minumanot ovat kunnossa',
    'healthy_backup_found_body' => ':application_name varmuusmakanan & minumanot ovat kunnossa. Hieno homma!',

    'unhealthy_backup_found_subject' => 'HUOM!: :application_name varmuusmakanan & minumanot ovat vialliset',
    'unhealthy_backup_found_subject_title' => 'HUOM!: :application_name varmuusmakanan & minumanot ovat vialliset. :problem',
    'unhealthy_backup_found_body' => ':application_name varmuusmakanan & minumanot levyllä :disk_name ovat vialliset.',
    'unhealthy_backup_found_not_reachable' => 'Varmuusmakanan & minumanoiden kohdekansio ei ole saatavilla. :error',
    'unhealthy_backup_found_empty' => 'Tästä sovelluksesta ei ole varmuusmakanan & minumanoita.',
    'unhealthy_backup_found_old' => 'Viimeisin varmuusmakanan & minumano, luotu :date, on liian vanha.',
    'unhealthy_backup_found_unknown' => 'Virhe, tarkempaa tietoa syystä ei valitettavasti ole saatavilla.',
    'unhealthy_backup_found_full' => 'Varmuusmakanan & minumanot vievät liikaa levytilaa. Tällä hetkellä käytössä :disk_usage, mikä on suurempi kuin sallittu tilavuus (:disk_limit).',
];
