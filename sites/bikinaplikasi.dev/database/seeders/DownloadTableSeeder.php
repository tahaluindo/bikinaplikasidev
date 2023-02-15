<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DownloadTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('download')->delete();
        
        \DB::table('download')->insert(array (
            0 => 
            array (
                'id' => 3,
            'judul' => 'XAMPP PHP 7.3.27 (Windows 64 Bit)',
                'path' => 'softwares/xampp-php-7-3-26.exe',
                'link' => 'https://www.apachefriends.org/xampp-files/7.3.27/xampp-windows-x64-7.3.27-1-VC15-installer.exe',
                'deskripsi' => '-',
            ),
            1 => 
            array (
                'id' => 4,
            'judul' => 'Sublime Text 3 (Windows 64 Bit)',
                'path' => 'softwares/sublime-text-3.exe',
                'link' => 'https://download.sublimetext.com/Sublime%20Text%20Build%203211%20x64%20Setup.exe',
                'deskripsi' => 'Aplikasi text editor ringan',
            ),
            2 => 
            array (
                'id' => 5,
                'judul' => 'Google Chrome Exe',
                'path' => 'softwares/google-chrome-exe.exe',
                'link' => 'https://dl.google.com/release2/chrome/VYWR7z03VITSenbdO3GEAQ_90.0.4430.72/90.0.4430.72_chrome_installer.exe',
                'deskripsi' => 'Browser Chrome v90.0.4430',
            ),
            3 => 
            array (
                'id' => 6,
                'judul' => 'Firefox Exe',
                'path' => 'softwares/firefox-exe.exe',
                'link' => 'https://download-installer.cdn.mozilla.net/pub/firefox/releases/88.0/win64/en-US/Firefox%20Setup%2088.0.exe',
                'deskripsi' => 'v88',
            ),
            4 => 
            array (
                'id' => 7,
                'judul' => 'Heidi SQL',
                'path' => 'softwares/heidi-sql.exe',
                'link' => 'https://www.heidisql.com/installers/HeidiSQL_11.2.0.6213_Setup.exe',
                'deskripsi' => 'v11.2',
            ),
            5 => 
            array (
                'id' => 8,
            'judul' => 'Teamviewer (Windows 64 bit)',
                'path' => 'softwares/teamviewer.exe',
                'link' => 'https://dl.teamviewer.com/download/version_15x/TeamViewer_Setup_x64.exe',
                'deskripsi' => '-',
            ),
            6 => 
            array (
                'id' => 9,
                'judul' => 'Github Desktop',
                'path' => 'softwares/github-desktop.exe',
                'link' => 'https://desktop.githubusercontent.com/releases/2.8.0-853674e1/GitHubDesktopSetup-x64.exe',
                'deskripsi' => 'v2.8.0',
            ),
            7 => 
            array (
                'id' => 10,
                'judul' => 'Balsamiq Wireframes 4.2.4',
                'path' => 'softwares/balsamiq-wireframes.exe',
                'link' => 'https://builds.balsamiq.com/bwd/Balsamiq_Wireframes_4.2.4_x64_Setup.exe',
                'deskripsi' => 'v4.2.4',
            ),
            8 => 
            array (
                'id' => 11,
                'judul' => 'Jar2Exe',
                'path' => 'softwares/jar-2-exe.exe',
                'link' => 'https://selenium2.bikinaplikasi.dev/softwares/j2e_x86.zip',
                'deskripsi' => 'Convertor & Encryptor file java jar ke exe',
            ),
            9 => 
            array (
                'id' => 12,
            'judul' => 'Laragon (Portable)',
                'path' => 'softwares/laragon.7z',
                'link' => 'https://udomain.dl.sourceforge.net/project/laragon/Portable/laragon.7z',
                'deskripsi' => 'PHP & Mysql Only',
            ),
            10 => 
            array (
                'id' => 13,
                'judul' => 'HTTRACK',
                'path' => 'softwares/httrack.exe',
                'link' => 'https://download.httrack.com/cserv.php3?File=httrack.exe',
                'deskripsi' => 'Website Copier',
            ),
            11 => 
            array (
                'id' => 14,
                'judul' => 'Postman Canary',
                'path' => 'softwares/postman-canary.exe',
                'link' => 'https://dl.pstmn.io/download/channel/canary/windows_64',
                'deskripsi' => 'v8.4',
            ),
            12 => 
            array (
                'id' => 15,
                'judul' => 'IObit Uninstaller',
                'path' => 'softwares/iobit-uninstaller.exe',
                'link' => 'https://prod.downloadnow.com/s/17/05/59/06/iobituninstaller.exe?GoogleAccessId=download-sps-prod@i-cmb-prod.iam.gserviceaccount.com&Expires=1620006313&Signature=hGao2VGyQW2ZQ8jzF8qd7hBeK6KuEmarocjvNz95NYVx98yx0Ang%2Fg%2FC8nyuXpGIu1VtIVz3KSZ3cFupTprLqqQz44dR0fZBftxNByCg9tIk2oFf%2F0Q1481%2FHhJSEgoK6%2B6AZZGTH9fxDLuuHiRXF7iaAd2d%2BZtyQ7R7mw%2BVIkUjMvLfHZIYe4UNC5zXtJApfVCYknbrDtACSMSFQ7fTdH%2BufzeAhI6gZTwN5jYfh1q%2FlBoDB1aVRn9Qa80KhnxM75syZaIiHDWIPNfLpS9tcFRixWhbyVekdkcUcONwwmm8S%2BHDt8%2BXJgjA%2Bx1TA537ICvqIINUMa5VJJ6ilD8DZg%3D%3D',
                'deskripsi' => 'Softwares untuk uninstall sampai ke akar akarnya',
            ),
            13 => 
            array (
                'id' => 16,
            'judul' => 'Power Iso (windows 64 bit)',
                'path' => 'softwares/power-iso.exe',
                'link' => 'https://www.poweriso.net/PowerISO7-x64.exe',
                'deskripsi' => '-',
            ),
            14 => 
            array (
                'id' => 17,
                'judul' => 'VLC Media Player',
                'path' => 'softwares/vlc-media-player.exe',
                'link' => 'https://mirror.downloadvn.com/videolan/vlc/3.0.12/win64/vlc-3.0.12-win64.exe',
                'deskripsi' => 'v3.0.12',
            ),
            15 => 
            array (
                'id' => 18,
                'judul' => 'HandBraker Exe',
                'path' => 'softwares/handbrake-exe.exe',
                'link' => 'https://github-releases.githubusercontent.com/41215835/f92a6f80-ad9d-11ea-93af-6af3ca728693?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAIWNJYAX4CSVEH53A%2F20210503%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20210503T013909Z&X-Amz-Expires=300&X-Amz-Signature=2e8afa1dd79658482042818ffccf54f6a4b65fadcd0e01fbca9e877aaf84a30a&X-Amz-SignedHeaders=host&actor_id=0&key_id=0&repo_id=41215835&response-content-disposition=attachment%3B%20filename%3DHandBrake-1.3.3-x86_64-Win_GUI.exe&response-content-type=application%2Foctet-stream',
                'deskripsi' => 'v1.3.3, Untuk compress video jadi ukuran super kecil',
            ),
            16 => 
            array (
                'id' => 19,
                'judul' => 'Appower Mirror',
                'path' => 'softwares/appower-mirror.exe',
                'link' => 'https://dw44.uptodown.com/dwn/oI1rsTCVEgAeN7STN5qO1XJzvr1nyHbRTU7EUQBmweSvnZyASwG6CdSZbtXMS3-guN3GAmp7Q_CER6YOhJaWH69TxdoRd7bmSIlpTN5Wa0xh5GfJKHPi_wkpJf3S6ecv/cfBFQsYuXNyseHpUDMhSrQkteAdmMmiXD0yG2E7087u9o033Qhjuuri220lXrBRIC6O60p5WElnDafviWkl87O_dSzyvVn5d0hogwb1JUyd-nF4ptVSvcEX6W_bKYskG/Ghi-3YT3DtBL3jFcs4qMowmqwDup_ovN9aOIYpxRJ4OiLhSqZ0pE70yz7YjKE-AzUK9v95_o7WmaJkJCC_1r3g==/apowermirror-1-5-9-4.exe',
                'deskripsi' => 'v1.5.9.4',
            ),
            17 => 
            array (
                'id' => 20,
                'judul' => 'Snipping Tool',
                'path' => 'softwares/snipping-tool.exe',
                'link' => 'https://freesnippingtool.com/setups/Free%20Snipping%20Tool%20-%205.2.0.0.msi',
                'deskripsi' => 'v5.2',
            ),
            18 => 
            array (
                'id' => 21,
                'judul' => 'Minitool',
                'path' => 'softwares/minitool.exe',
                'link' => 'https://selenium2.bikinaplikasi.dev/softwares/MINITOOL.exe',
                'deskripsi' => '-',
            ),
        ));
        
        
    }
}