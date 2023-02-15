<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admin_users')->delete();
        
        \DB::table('admin_users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'username' => 'admin',
                'password' => '$2y$10$hhQp3FZaTVOK1xzJYHIkkOdStN5.y/S4KljmId35PmJTc0s6N.0Lq',
                'name' => 'Administrator',
                'email' => 'admin@gmail.com',
                'avatar' => NULL,
                'saldo' => 0,
                'remember_token' => 'ivs2kBSKFGVzqZvkrfutp6mZMdgJCa2etvHj5uZHlHkD6XqkPtN5DIkg0WUY',
                'created_at' => '2021-03-11 00:39:24',
                'updated_at' => '2021-03-11 00:44:16',
                'provider' => NULL,
                'socialite_id' => NULL,
            ),
            1 => 
            array (
                'id' => 37,
                'username' => 'ramdanriawan',
                'password' => '$2y$10$MojpR7Cv/Aa64U3qKCHhUOTta9L9JbvNP3PnKPXiuxP5L/4LDzQQO',
                'name' => 'Ramdan Riawan',
                'email' => 'ramdanriawan3@gmail.com',
                'avatar' => 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAFh0lEQVR4nO2d3U7qTBSG3wLhR9CNQVARI/FMT3v/l8ANmHggEExQYiVBi1j6HWj5Su2UdpjpLNp5EpO9re63rHevtWamP2O4rgsNHUqqT4ADnv9BhvCzkAR1Q/4EfzAYJP5HTNMMM5GkSQaxkrV1MjzBj4tpmsFvkTCIiiEuINeAXfgMUmqMSkM2wiqNCBLInNTNUWEISSOCqDImbUNcyiaw+DUnFVMKaYjgJysO0gxgk8ku+IbciZBqyGAw2BhxqGZ4+D6D+/u5pCCrZB1En+BFZn+RZkgWjQgio7eILlkH3SuSIqO3iDRE+eROBb7PK8QUUSUrN1kRhYgSJiJDtBm/+EoYN/saQmIhjCDccdmnZOnMiIC3fPFmiDZjB7zli8cQXaaSkSheXBmisyMePHFKYkiuJn2iSDp5TJQh2gw+ksQtliEyVzfzRJw4xh326lIlgDhD4TgZos0QRJyhcFpXDDUx2WWIzg7B7MqSKEO0GZKIMkWXLGKwDNHD3HT4E2dmhuhyJRdWfHXJIkbYxHCvZn57e4vT09OdP+e6LhzHwXq9huM4sG0btm1jsVhgPp+D9zqNav2kBCeLyp4PMQwDpdL/8rVabfNnx3FgWRaen5+xXC4zqc8iWLJIDHWLxSJarRbu7+/R7XYzrR8cApPuIYVCAZeXl+j3+7nRJ22IR6vVQrvdzoV+qoZ4DdRxnMRNs9vtolgsHrR+HPxNXXr/eH19xWg02vzdMAxUKhXU63W0Wi0cHx8zf7dUKqHZbGI2mx2sPovBYOA9mGooLVmu68K2bcxmMzw8PGA4HEb+/L9//zKlHwapHvLy8oL393fm8Wq1mml9gJghACID4p83ZFWfnCGO4zCPFQryT1e1vqdAYkIIAOVymXns+/s7s/reBJFchkStQ318fGRen5QhvV4PR0dHzOOWZWVaH1D88plisYhKpYJGo4Gzs7OtBb4gy+USb29vmdIPI1VDOp0OOp1O4t9zXRfD4XDvJXHV+nEgVbJYjMdjzOfzXOiTfl+W4zgYjUZSliuo6pM1xLIsjMfj1C8QqdYnaYht23h8fMylfqo9xHEcrFarzRdrVlytVqVcqVOtH4dUM2Q2m20tf9dqNdzd3cEw/t4QfnFxAcuyhE7GVOvHQeko6/PzE9PpNPSYYRjo9/uhwcqKfhjKh72TyYTZOGu1mvTSoVo/iGeIEfKWzlRYr9dbZSTI+fk56vV6ZvU9vPuzlGcI8HMNgrUskUbpUK3vh4QhADAajSJHPVdXV5nW9yBjyGq1wmQyYR7vdDpoNBqZ1fcgYwgATKdTLBaL0GNe6ZB51U61PrBtiLLG7ufp6Ym5qlqpVNDr9TKn77/hmlSGANFzAwBot9s4OTnJrD45Q4CfucHX1xfz+M3NjdS7CFXqkzRkvV5H3rRWLpdxfX2dSf2gIST6CBA9NwB+boBuNpsHrx98YEf4E1SaZAQNCStZZLIk64S9+4RkD8kzTEN0lsiFFV+WIST2Y8oBf+KsSxYxogzRzV0SUS8y25Uh2hTB7HqrnC5ZxIhjiM4SQYh656L3lKiIc8otpmnGesNSLENM09TDYAHEiWOiHqKzhI8kcUtiiAHdTxLj6xuxqgzXKEubEg+eOPEYovtJMhLFi3ceokvXDnh32Nl3l7ZcbpUXxb77su87U9flKxzuuIhYOtHl6xcR+xiK3As3t+Vr3zLlR+TiogHkb0gs0gxA/GpvriaPSSd9cdD7qXMgcz91WddDDABGFleJfau2QjPDQ1aGBDn4hi+6V7BI64rhQfcWGb2CRVoZ4ucg+ovMPhGFCkM8SBqjyoiNoEJD/CjvMWn1iF1QMcRj62RkGhTSz0isy1EzJMifk+MxiTGYIGFAEOqGhMFzwiSDH8Z/bLQmhVaX/l4AAAAASUVORK5CYII=',
                'saldo' => 0,
                'remember_token' => NULL,
                'created_at' => '2021-05-02 07:03:35',
                'updated_at' => '2021-05-02 13:04:45',
                'provider' => NULL,
                'socialite_id' => NULL,
            ),
            2 => 
            array (
                'id' => 38,
                'username' => 'coderindo2',
                'password' => '$2y$10$FefNGphr9J//XhU6rsuGqOMWvQns0U/Ivo6dui3c5HVgtiU23lj5y',
                'name' => 'Coderindo',
                'email' => 'coderindo2@gmail.com',
                'avatar' => 'data:image/png;base64,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',
                'saldo' => 0,
                'remember_token' => NULL,
                'created_at' => '2021-05-02 07:42:08',
                'updated_at' => '2021-05-02 07:42:08',
                'provider' => NULL,
                'socialite_id' => NULL,
            ),
        ));
        
        
    }
}