<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SekolahsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sekolahs')->delete();
        
        \DB::table('sekolahs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nama' => 'SMP N 21 BATANGHARI',
                'no_telp' => '082372618040',
                'alamat' => 'Jln. Jend. Sudirman Km. 3 Muara Bulian, RT/RW 22/05',
                'deskripsi' => '<p>Adalah salah satu SMP terakreditasi A.</p>',
                'visi' => '<p>Berprestasi berdasarkan iman dan taqwa dengan berbudaya lingkungan.</p>',
                'misi' => '<ol>
<li>Menigkatkan disiplin dan kemampuan pribadi semua personil sekolah.</li>
<li>Bersungguh-sungguh dan ikhlas melaksanakan tugas.</li>
<li>Menjalin hubungan dan kerja sama yang harmonis antara kepala sekolah, guru, tenaga tata usaha, dan masyarakat serta instansi terkait.</li>
<li>Melengkapi sarana dan prasarana sekolah.</li>
<li>Menignkatkan pelaksanakan agama, etika dan tata tertib yang berlaku disekolah dan dalam lingkungan masyarakat.</li>
<li>Menciptakan lingkungan yang indah, bersih, nyaman dan kondusif.</li>
</ol>',
                'created_at' => '2020-08-28 00:00:00',
                'updated_at' => '2021-01-25 15:09:41',
            ),
        ));
        
        
    }
}