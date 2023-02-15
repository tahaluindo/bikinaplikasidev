<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeoGratisController extends Controller
{
    public function scrape(Request $request)
    {
//        1. 
        $response = (new \GuzzleHttp\Client())->request('POST', "https://seogratis.co.id/article-rewriter/output", [
            'form_params' => [
                'data' => "your article below then click Submit to watch this article rewriter do it's thing!"
            ]
        ]);
//
//        return $response->getBody()->getContents();

//        2. meta tags generator
//        $response = (new \GuzzleHttp\Client())->request('POST', "https://seogratis.co.id/meta-tag-generator/output", [
//            'form_params' => [
//                'title' => "sdfdsf!",
//                'description' => "sdfdsf!",
//                'keywords' => "sdfdsf!",
//                'robotsIndex' => "index",
//                'robotsLinks' => "follow",
//                'revisit' => 'yes',
//                'revisitdays' => 4,
//                'author' => 'yes',
//                'authorname' => 'fghfg',
//                'submit' => 'Generate Meta Tags'
//            ]
//        ]);
//
//        return $response->getBody()->getContents();

////        3. meta tags analyzer
//        $response = (new \GuzzleHttp\Client())->request('POST', "https://seogratis.co.id/meta-tags-analyzer/output", [
//            'form_params' => [
//                'url' => "https://bikinaplikasi.dev",
//            ]
//        ]);
//
//        return $response->getBody()->getContents();

//        3. keywords position checker
        $response = (new \GuzzleHttp\Client())->request('POST', "https://seogratis.co.id/ajax", [
            'form_params' => [
                'keywordPos'=> '1',
                'keyword'=> 'keyword2',
                'searchUrl'=> 'bikinaplikasi.dev',
                'pos'=> '5'
            ]
        ]);
//
//        return $response->getBody()->getContents();
        
//        4. keywords position checker
//        $response = (new \GuzzleHttp\Client())->request('POST', "https://seogratis.co.id/ajax", [
//            'form_params' => [
//                'keywordPos'=> '1',
//                'keyword'=> 'keyword2',
//                'searchUrl'=> 'bikinaplikasi.dev',
//                'pos'=> '5'
//            ]
//        ]);
//
//        return $response->getBody()->getContents();

        
//        5. backlink checker
//        $response = (new \GuzzleHttp\Client())->request('POST', "https://seogratis.co.id/backlink-checker/output", [
//            'form_params' => [
//                'url' => 'https://facebook.com'
//            ]
//        ]);
//
//        return $response->getBody()->getContents();
        
//        6. backlink checker
//        $response = (new \GuzzleHttp\Client())->request('POST', "https://seogratis.co.id/alexa-rank-checker/output", [
//            'form_params' => [
//                'url' => 'https://facebook.com'
//            ]
//        ]);
//
//        return $response->getBody()->getContents();
        
//        7. backlink checker
//        $response = (new \GuzzleHttp\Client())->request('GET', "https://seogratis.co.id/word-counter", [
//            'form_params' => [
//                'url' => 'https://facebook.com'
//            ]
//        ]);
//
//        return $response->getBody()->getContents();
//        
//        8. My Ip Address
        $response = (new \GuzzleHttp\Client())->request('GET', "https://seogratis.co.id/my-ip-address", [
            'form_params' => [
                'url' => 'https://facebook.com'
            ]
        ]);

        return $response->getBody()->getContents();
    }
}
