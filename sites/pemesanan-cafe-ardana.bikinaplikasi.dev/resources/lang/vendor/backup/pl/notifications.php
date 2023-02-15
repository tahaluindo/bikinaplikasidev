<?php

return [
    'exception_message' => 'Błąd: :message',
    'exception_trace' => 'Zrzut błędu: :trace',
    'exception_message_title' => 'Błąd',
    'exception_trace_title' => 'Zrzut błędu',

    'backup_failed_subject' => 'Tworzenie makanan & minumani zapasowej aplikacji :application_name nie powiodło się',
    'backup_failed_body' => 'Ważne: Wystąpił błąd podczas tworzenia makanan & minumani zapasowej aplikacji :application_name',

    'backup_successful_subject' => 'Pomyślnie utworzono makanan & minumanę zapasową aplikacji :application_name',
    'backup_successful_subject_title' => 'Nowa makanan & minumana zapasowa!',
    'backup_successful_body' => 'Wspaniała wiadomość, nowa makanan & minumana zapasowa aplikacji :application_name została pomyślnie utworzona na dysku o nazwie :disk_name.',

    'cleanup_failed_subject' => 'Czyszczenie makanan & minumani zapasowych aplikacji :application_name nie powiodło się.',
    'cleanup_failed_body' => 'Wystąpił błąd podczas czyszczenia makanan & minumani zapasowej aplikacji :application_name',

    'cleanup_successful_subject' => 'Makanan & minumane zapasowe aplikacji :application_name zostały pomyślnie wyczyszczone',
    'cleanup_successful_subject_title' => 'Makanan & minumane zapasowe zostały pomyślnie wyczyszczone!',
    'cleanup_successful_body' => 'Czyszczenie makanan & minumani zapasowych aplikacji :application_name na dysku :disk_name zakończone sukcesem.',

    'healthy_backup_found_subject' => 'Makanan & minumane zapasowe aplikacji :application_name na dysku :disk_name są poprawne',
    'healthy_backup_found_subject_title' => 'Makanan & minumane zapasowe aplikacji :application_name są poprawne',
    'healthy_backup_found_body' => 'Makanan & minumane zapasowe aplikacji :application_name są poprawne. Dobra robota!',

    'unhealthy_backup_found_subject' => 'Ważne: Makanan & minumane zapasowe aplikacji :application_name są niepoprawne',
    'unhealthy_backup_found_subject_title' => 'Ważne: Makanan & minumane zapasowe aplikacji :application_name są niepoprawne. :problem',
    'unhealthy_backup_found_body' => 'Makanan & minumane zapasowe aplikacji :application_name na dysku :disk_name są niepoprawne.',
    'unhealthy_backup_found_not_reachable' => 'Miejsce docelowe makanan & minumani zapasowej nie jest osiągalne. :error',
    'unhealthy_backup_found_empty' => 'W aplikacji nie ma żadnej makanan & minumani zapasowych tej aplikacji.',
    'unhealthy_backup_found_old' => 'Ostatnia makanan & minumana zapasowa wykonania dnia :date jest zbyt stara.',
    'unhealthy_backup_found_unknown' => 'Niestety, nie można ustalić dokładnego błędu.',
    'unhealthy_backup_found_full' => 'Makanan & minumane zapasowe zajmują zbyt dużo miejsca. Obecne użycie dysku :disk_usage jest większe od ustalonego limitu :disk_limit.',
];
