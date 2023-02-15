<?php

namespace App\Http\Controllers;
header("X-Accel-Buffering: no");
set_time_limit(0);

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;


class WordpressController extends Controller
{
    public function scrape(Request $request)
    {

        if ($request->semua == 'ya') {
            $json = $this->getJson(0);
            $info = json_decode($json)->info;

            for ($i = 1; $i <= $info->pages; $i++) {
                $json = $this->getJson($i);
                $theme = json_decode($json)->themes;

                foreach ($theme as $item) {
                    Theme::create([
                        'name' => $item->name,
                        'screenshot_url' => $item->screenshot_url,
                        'download_link' => $item->download_link
                    ]);
                    ob_start();
                    echo "Berhasil scrape theme $item->name <br>";
                    $output = ob_get_contents();
                    ob_end_clean();
                }

                ob_start();
                echo "Sedang scrape halaman $i dari $info->pages <br>";
                $output = ob_get_contents();
                ob_end_clean();
            }
        } elseif (isset($request->dari) && isset($request->sampai) && $request->sampai > 0) {

            $json = $this->getJson(0);
            $info = json_decode($json)->info;

            if ($info->pages < $request->sampai) {
                die("Jumlah halaman hanya ada $info->pages!");
            }

            for ($i = $request->dari; $i <= $request->sampai; $i++) {
                $json = $this->getJson($i);
                $theme = json_decode($json)->themes;

                foreach ($theme as $item) {
                    Theme::create([
                        'name' => $item->name,
                        'screenshot_url' => $item->screenshot_url,
                        'download_link' => $item->download_link
                    ]);
                    ob_start();
                    echo "Berhasil scrape theme $item->name <br>";
                    $output = ob_get_contents();
                    ob_end_clean();
                }

                ob_start();
                echo "Sedang scrape halaman $i dari $info->pages <br>";
                $output = ob_get_contents();
                ob_end_clean();
            }
        } else {
            $response = (new \GuzzleHttp\Client())->request('GET', "https://api.wordpress.org/themes/info/1.2/?callback=jQuery36005966759889368695_1638945969643&action=query_themes&request[per_page]=12&request[locale]=en_US&request[fields][description]=true&request[fields][sections]=false&request[fields][tested]=true&request[fields][requires]=true&request[fields][downloaded]=false&request[fields][downloadlink]=true&request[fields][last_updated]=true&request[fields][homepage]=true&request[fields][theme_url]=true&request[fields][parent]=true&request[fields][tags]=true&request[fields][rating]=true&request[fields][ratings]=true&request[fields][num_ratings]=true&request[fields][extended_author]=true&request[fields][photon_screenshots]=true&request[fields][active_installs]=true&request[fields][requires_php]=true&request[browse]=popular&request[page]=$request->page&_=1638945969644", [

            ]);

            $jsonP = $response->getBody()->getContents();

            $json = substr($jsonP, strpos($jsonP, "(") + 1);
            $json = str_replace(");", "", $json);

            $theme = json_decode($json)->themes;

            foreach ($theme as $item) {
                Theme::create([
                    'name' => $item->name,
                    'screenshot_url' => $item->screenshot_url,
                    'download_link' => $item->download_link
                ]);

                ob_start();
                echo "Berhasil scrape theme $item->name\n";
                $output = ob_get_contents();
                ob_end_clean();
            }
        }
    }

    /**
     * @param $i
     * @return false|string|string[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getJson($i)
    {
        $response = (new \GuzzleHttp\Client())->request('GET', "https://api.wordpress.org/themes/info/1.2/?callback=jQuery36005966759889368695_1638945969643&action=query_themes&request[per_page]=12&request[locale]=en_US&request[fields][description]=true&request[fields][sections]=false&request[fields][tested]=true&request[fields][requires]=true&request[fields][downloaded]=false&request[fields][downloadlink]=true&request[fields][last_updated]=true&request[fields][homepage]=true&request[fields][theme_url]=true&request[fields][parent]=true&request[fields][tags]=true&request[fields][rating]=true&request[fields][ratings]=true&request[fields][num_ratings]=true&request[fields][extended_author]=true&request[fields][photon_screenshots]=true&request[fields][active_installs]=true&request[fields][requires_php]=true&request[browse]=popular&request[page]=$i&_=1638945969644", [

        ]);

        $jsonP = $response->getBody()->getContents();

        $json = substr($jsonP, strpos($jsonP, "(") + 1);
        $json = str_replace(");", "", $json);
        return $json;
    }
}