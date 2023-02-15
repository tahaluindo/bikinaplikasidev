<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SessionTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('session')->delete();
        
        \DB::table('session')->insert(array (
            0 => 
            array (
                'id' => '79RVlOTE54YAEtAwBh16pHXkzytH661KbErsTkBR',
                'user_id' => NULL,
                'ip_address' => '10.1.17.247',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36',
                'payload' => 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMFpuWGxtT2pXQWZadjlydWhKVTBLWmxzUW02RnRXbUtzVEN6WnBQTiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9iaWtpbmFwbGlrYXNpLmRldi9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzc7fQ==',
                'last_activity' => 1620043007,
            ),
            1 => 
            array (
                'id' => 'Ba1HMRyPyWfs70KhfA0BJNIzcrDQWvTivp7mn7tK',
                'user_id' => NULL,
                'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0',
                'payload' => 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicFhxaEkxRjJNQzhDNnk1WGpiVlN1RGhkMW82clp0Vzc2STQxYzdyRCI7czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQwOiJodHRwOi8vbG9jYWxob3N0OjkwMDAvYWRtaW4vdmlkZW8vY3JlYXRlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==',
                'last_activity' => 1620044442,
            ),
            2 => 
            array (
                'id' => 'bnbRwkaRHQjZ8Rxo6B187BX4noeCl92RVBMLqPAb',
                'user_id' => NULL,
                'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiU0tyc0UxekhtUFRHc0RoU2tiTFBZT0JSeWhDUm9JYXhsSDVxQnlwMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly9sb2NhbGhvc3Q6OTAwMC9kYi1iYWNrdXAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19',
                'last_activity' => 1620053677,
            ),
            3 => 
            array (
                'id' => 'GP9xKr5pPuNQByPaX9YbPJqoyvAJ72euRv81Pb0B',
                'user_id' => NULL,
                'ip_address' => '10.1.3.164',
            'user_agent' => 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN0lLRWFXdW1KQjlrWktYd3dRZzl1aG5DWnZVYWNVeXBpUUJqZ0FhUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9iaWtpbmFwbGlrYXNpLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => 1620038873,
            ),
            4 => 
            array (
                'id' => 'nJU0l52c8AzCZO6aSMaPePtXVHhjBsScTXePMHj9',
                'user_id' => NULL,
                'ip_address' => '10.1.17.247',
                'user_agent' => 'NetSystemsResearch studies the availability of various services across the internet. Our website is netsystemsresearch.com',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXNqZGh6NDRCNGVOdE5RNFRCQ0l4SzNrZFBrWTB0aWs3aHozVHA5ViI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9iaWtpbmFwbGlrYXNpLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => 1620051009,
            ),
            5 => 
            array (
                'id' => 'pTm2xYSseLaXVw1YpaTSPOssGi4EGaCN9PXGP781',
                'user_id' => NULL,
                'ip_address' => '10.1.89.191',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0',
                'payload' => 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZFZRTlBPbFVZVVRrMWZqenFSem8xR0dCOVhwY0lMTUM5RnRSZUxQQiI7czozOiJ1cmwiO2E6MDp7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM2OiJodHRwOi8vYmlraW5hcGxpa2FzaS5kZXYvYWRtaW4vdmlkZW8iO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMjoiaXNMb2dnZWRJbkJ5TWFzdGVyUGFzcyI7YjoxO30=',
                'last_activity' => 1620043546,
            ),
            6 => 
            array (
                'id' => 'UJ9DujaXb3ADQ5ykwKbH8T5t8v3rGeXnhqE2C3kK',
                'user_id' => NULL,
                'ip_address' => '10.1.5.194',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0',
                'payload' => 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRHB0ZUQzckppRFhodEVqZlJ4ekowbjlaTkFDck9kd3E5cjFXNENUUSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNjoiaHR0cDovL2Jpa2luYXBsaWthc2kuZGV2L2FkbWluL3ZpZGVvIjt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9iaWtpbmFwbGlrYXNpLmRldi9hZG1pbi92aWRlbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => 1620037772,
            ),
            7 => 
            array (
                'id' => 'ukfWdVIuNKZbM7VhjvKThzYCZckcDaXi2XaCy1fl',
                'user_id' => NULL,
                'ip_address' => '127.0.0.1',
            'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.85 Safari/537.36',
                'payload' => 'YTo0OntzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovL2xvY2FsaG9zdDo5MDAwL2FkbWluIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJfdG9rZW4iO3M6NDA6ImVTaWRmVDB0TlZtNUxLSGF5YzVPVnAxUE9pT01DQm5JRTduS001OHciO3M6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzc7fQ==',
                'last_activity' => 1620046315,
            ),
            8 => 
            array (
                'id' => 'xS55ttH0KvVHcEFrHh3deRxaslzg6Y8WluIw0XsR',
                'user_id' => NULL,
                'ip_address' => '10.1.49.78',
            'user_agent' => 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)',
                'payload' => 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiczZURExZaVpCdjdGZktJaEJETXkxZGlSQk1lZHhRVFlDZG5LWFFxeiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly9iaWtpbmFwbGlrYXNpLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=',
                'last_activity' => 1620039791,
            ),
        ));
        
        
    }
}