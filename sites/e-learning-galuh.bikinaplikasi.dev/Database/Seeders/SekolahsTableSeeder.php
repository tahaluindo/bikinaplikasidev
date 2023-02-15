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
                'nama' => 'SMA Negeri 12 Kota Jambi',
                'no_telp' => '085368739455',
                'alamat' => 'Jl.Kapten A.Bakarudin Kel.Beliung Kec.Alam Barajo Kota Jambi Kode Pos 36125',
                'deskripsi' => '<p>Adalah salah satu sekolah SMA di Kota Jambi</p>',
                'visi' => '<p>Mewujudkan Sumber Daya Manusia yang Berakhlak Mulia yang Mampu Bersaing Dalam Dunia Kerja Secara Global</p>',
                'misi' => '<p>1. Menciptakan suasana yang kondusif untuk mengembangkan potensi siswa melalui penekanan pada penguasaan kompetensi bidang ilmu pengetahuan dan teknologi serta Bahasa Inggris.</p>

<p>2. Meningkatkan penguasaan Bahasa Inggris sebagai alat komunikasi dan alat untuk mempelajari pengetahuan yang lebih luas.</p>

<p>3. Meningkatkan frekuensi dan kualitas kegiatan siswa yang lebih menekankan pada pengembangan ilmu pengetahuan dan teknologi serta keimanan dan ketakwaan yang menunjang proses belajar mengajar dan menumbuhkembangkan disiplin pribadi siswa.</p>

<p>4. Menumbuhkembangkan nilai-nilai ketuhanan dan nilai-nilai kehidupan yang bersifat universal dan mengintegrasikannya dalam kehidupan</p>

<p>5. Menerapkan manajemen partisipatif dengan melibatkan seluruh warga sekolah, Lembaga Swadaya Masyarakat, stake holders dan instansi serta institusi pendukung pendidikan lainnya.</p>',
                'created_at' => '2020-08-27 17:00:00',
                'updated_at' => '2020-11-28 14:03:01',
            ),
        ));
        
        
    }
}