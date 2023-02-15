<?php

use App\Models\User;
use App\Models\Berita;
use App\Models\Disposisi;
use App\Models\Rekrutmen;
use App\Models\UnitKerja;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Http\Livewire\Jabatan\Index;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\LoginController;

// dd(\Hash::make('pengunjung'));
//dump(\Hash::make('guru'));
//dump(\Hash::make('siswa'));
//die;


Route::domain('www.bikinaplikasi.dev', function (\Illuminate\Http\Request $request) {
    header('location: https://bikinaplikasi.dev');
    die;
});

ini_set("memory_limit", "-1");
//
//Route::get('/phpmyadmin', function () {
//    return redirect('http://185.211.5.241:81');
//});

Route::get('/pull', function () {
    $row = exec('dir', $output, $error);
    while (list(, $row) = each($output)) {
        echo $row, "<BR>n";
    }
    if ($error) {
        echo "Error : $error<BR>n";
        exit;
    }
    return;
    file_get_contents("test.txt");
});

Route::get('/admin/auth/login', function () {
    return redirect('/');
});

Route::get('/get-watch-js', function () {
    die(file_get_contents("watch.js"));
});

Route::get('/pembayaran', function () {
    header('location: https://sg.docworkspace.com/d/sIBOBoqtojJXZlgY');
    die;
});

Route::get('/clear', function () {
    date_default_timezone_set("Asia/Jakarta");

    $waktu = now()->addDays(-2)->format("Y-m-d");

    exec("rm -rf ~/setup_server_default_backup/backup_$waktu-*");

    die($waktu);
});

Route::get("/laundry_app/license_code/check", function () {
    header("content-type: application/json");
    $license_codes = ["TRIAL"];
    die(in_array(request('license_code'), $license_codes) ? collect([
        "valid" => true,
        "last_login_computer_name" => 'TEAMOS-PC'
    ])->toJson() : collect([
        "valid" => false,
        "last_login_computer_name" => 'TEAMOS-PC'
    ])->toJson());
});

Route::get("/laundry_app/update_computer_name", function () {
    header("content-type: application/json");
    $license_codes = ["TEAMOS-PC"];
    die(in_array(request('computer_name'), $license_codes) ? collect([
        "success" => true,
        "message" => 'Nama komputer berhasil diupdate ke: ' . request("computer_name")
    ])->toJson() : collect([
        "success" => false,
        "message" => 'Gagal mengupdate nama komputer ke: ' . request("computer_name")
    ])->toJson());
});

Route::get("/laundry_app/check_login", function () {
    header("content-type: application/json");
    $computer_names = ["TEAMOS-PC"];
    die(in_array(request('computer_name'), $computer_names) ? collect([
        "success" => true,
        "last_login_computer_name" => 'TEAMOS-PC'
    ])->toJson() : collect([
        "success" => false,
        "last_login_computer_name" => 'TEAMOS-PC'
    ])->toJson());
});


Route::get("/laundry_app/reset_password", function () {
    header("content-type: application/json");
    $request = request();

    // Create the Transport
    $transport = (new \Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        ->setUsername('ramdanriawan3@gmail.com')
        ->setPassword('mxoawcotxevinndd');

    // Create the Mailer using your created Transport
    $mailer = new \Swift_Mailer($transport);

    // Create a message
    $token = encrypt($request->email . time() . csrf_token());
    $link_reset_password = secure_url('reset_password') . "?token=" . $token;

    $message = (new \Swift_Message('Lupa Password'))
        ->setFrom(['ramdanriawan3@gmail.com' => 'Ramdan Riawan'])
        ->setTo([$request->email])
        ->setBody("<h2>Kode Reset Password</h2> Kamu melakukan permintaan reset password, pastekan kode ini: $request->kode")
        ->setContentType('text/html');

    // Send the message
    try {
        $result = $mailer->send($message);
        die(collect([
            "success" => true
        ])->toJson());
    } catch (\Throwable $e) {
        die(collect([
            "success" => false,
            "message" => $e->getMessage()
        ])->toJson());
    }
});

Route::get('/login_instagram', function () {
    $descriptorspec = array(
        array('pipe', 'r'),               // stdin
        array('file', 'myfile.txt', 'a'), // stdout
        array('pipe', 'w'),               // stderr
    );

    $username = \request()->username;
    $password = \request()->password;

//    $proc = proc_open("java -jar selenium.jar $username $password", $descriptorspec, $pipes);
    echo system("java -jar selenium.jar $username $password");

});

Route::get('/db-backup', function () {
    $descriptorspec = array(
        array('pipe', 'r'),               // stdin
        array('file', 'db-backup.txt', 'a'), // stdout
        array('pipe', 'w'),               // stderr
    );

    $proc = proc_open("cd ../ && php artisan db:backup &", $descriptorspec, $pipes);
});

// membuat akun email skligus ig
Route::get('/instaaddr/email/create', function () {
//    dd(\DB::connection("social_app")->table('emails')->get());
    header('Access-control-allow-origin: *');

    if (!\Validator::make(request()->all(), ['email' => 'required|email'])->fails()) {
        \DB::transaction(function () {
            $email_insert = \DB::connection("social_app")->table('emails')->insert([
                'instaaddr_id' => request('instaaddr_id'),
                'email' => request('email'),
                'status' => 'Aktif'
            ]);

            // use the factory to create a Faker\Generator instance
            $faker = Faker\Factory::create("id_ID");

            \DB::connection("social_app")->table('instagram_fake_accounts')->insert([
                'email_id' => \DB::connection('social_app')->table('emails')->get()->last()->id,
                'fullName' => $faker->firstName . ' ' . $faker->lastName,
                'username' => $faker->userName . rand(1000, 9999),
                'password' => $faker->password(6, 10),
                'registered' => 'N'
            ]);
        });
    }
//    
//    var i = 0;
//    var interval = setInterval(() => {
//       $('#link_addMailAddrByAuto').click();
//    
//        setTimeout(() => {
//            var email = $('.noticebox u b').text();
//        
//            if(email.indexOf("@")) {
//                $.ajax({
//                    url: "http://localhost:9000/instaaddr/email/create",
//                    data: {
//                        instaaddr_id: 1,
//                        email: email
//                    }
//                });
//            }
//        }, 500)
//    
//        if(i == 1000) {
//            removeInterval(interval);
//        }
//    
//        i++;
//    }, 1000);
});

Route::get("/shopee_update_products", function () {

    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://seller.shopee.co.id/api/v3/product/update_product/?version=3.1.0&SPC_CDS=42932e4f-298e-44ad-8388-502c0a94c7f9&SPC_CDS_VER=2',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '[
    {
        "id": 9138497022,
        "name": "Mukena Margarry Navy Darkgrey",
        "brand": "",
        "images": [
            "c9ca0c9f2ad7e392081708c87044bbe1"
        ],
        "description": "Status: Ready \\r Berat: 1.1 KG (1100 gram)\\n\\r \\r \\rBhn Embos 3D Kombi Renda Mewah Dan Tille UK XL +Tas.",
        "model_list": [
            {
                "id": 54690054880,
                "sku": "",
                "tier_index": [
                    0
                ],
                "is_default": true,
                "name": "Mukena Margarry Navy Darkgrey",
                "item_price": ""
            }
        ],
        "category_path": [
            43,
            1107,
            12402
        ],
        "attribute_model": {
            "attribute_model_id": 17961,
            "attributes": [
                {
                    "status": 1,
                    "attribute_id": 15565,
                    "value": "Tidak Ada Merek"
                },
                {
                    "status": 2,
                    "attribute_id": 15562,
                    "value": "Katun"
                }
            ]
        },
        "parent_sku": "",
        "wholesale_list": [],
        "installment_tenures": {
            "status": 0,
            "enables": [],
            "tip_type": 0
        },
        "weight": "1100",
        "dimension": {
            "width": 0,
            "height": 0,
            "length": 0
        },
        "pre_order": false,
        "days_to_ship": 2,
        "condition": 1,
        "size_chart": "",
        "video_list": [],
        "video_task_id": "",
        "tier_variation": [
            {
                "name": "",
                "options": [
                    ""
                ],
                "images": []
            }
        ],
        "add_on_deal": [],
        "dangerous_goods": 0,
        "price": "360000",
        "stock": 21,
        "logistics_channels": [
            {
                "size": 0,
                "price": "22000",
                "cover_shipping_fee": false,
                "enabled": true,
                "item_flag": "0",
                "channelid": 8003,
                "sizeid": 0
            },
            {
                "size": 0,
                "price": "18000",
                "cover_shipping_fee": false,
                "enabled": true,
                "item_flag": "0",
                "channelid": 8000,
                "sizeid": 0
            },
            {
                "size": 0,
                "price": "37000",
                "cover_shipping_fee": false,
                "enabled": true,
                "item_flag": "0",
                "channelid": 8002,
                "sizeid": 0
            }
        ],
        "ds_cat_rcmd_id": "",
        "category_recommend": [],
        "unlisted": false
    }
]',
        CURLOPT_HTTPHEADER => array(
            'sec-ch-ua: " Not A;Brand";v="99", "Chromium";v="90", "Google Chrome";v="90"',
            'Accept: application/json, text/plain, */*',
            'sc-fe-session: 3581511f-764b-4307-9b94-2a3c7473eb65',
            'sc-fe-ver: 25323',
            'sec-ch-ua-mobile: ?0',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36',
            'Content-Type: application/json;charset=UTF-8',
            'Sec-Fetch-Site: same-origin',
            'Sec-Fetch-Mode: cors',
            'Sec-Fetch-Dest: empty',
            'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJjcmVhdGVfdGltZSI6MTYyMDQwMzQwMiwiaWQiOiJiZjczYmMzMS1hZjRkLTExZWItYjBkMi1jY2JiZmU1ZDU3MjkifQ.BqTbU0iLlqFnQi-6edwNEWkomK_q_-sYne0uvY9Ali8',
            'Cookie: SPC_CDS=42932e4f-298e-44ad-8388-502c0a94c7f9; SPC_SC_SA_UD=; UYOMAPJWEMDGJ=; SPC_IVS=; SPC_SC_SA_TK=; SPC_F=C7EZeBHZ4hgri1j15X6O39wIOSaFE4wi; SC_DFP=p1gINPevm69Q0nD7oSK6fAgRaTBYl1cV; RO_T="qWicXthOO3ooekw8PQ9R0krG9L/PsLaBNNq1+AHDJtw8JhtJo/Sf06NsBpIAs5LA"; SPC_EC="TUZsxAYzMOdzR8KUw5fqHWk7BUHbbmPQHUBFlSsUuqjsrnsYVP+rJYmixPU6F28NW/oV/mH35b66RVtjIpUCqOE+PEbB8JA4D95n00ui6oHfPx/uu+L0D69msMewim5yIloz+/Df6ohgZfNH1/p3IsjKrBJn/UKVtv34O2GNFhvbqoehzBxAS2N3JeFDHN02"; SC_SSO_U=-; SPC_STK="bsKRG5EMZxsZBP3Jw+b640BP4rK6Rp9PYiFANh1rgH3aAXYlVQEwKJAv4oUo7HIXEP3FH/55dsVYGoNJMQin5yleoKgOIL9huKxdjKfg1JTe8uaBLXW5iP2rnazojY8IgJr8D53nUxqVFoct60FvPOtxAeXfip4MPESuefRZqTMLXCiWEGwAPCCutF0zEele"; SPC_U=373067965; SPC_SC_TK=a5f51e5a6556f64254aef1d4670178a6; SC_SSO=-; SPC_SC_UD=373067965; SPC_WST="TUZsxAYzMOdzR8KUw5fqHWk7BUHbbmPQHUBFlSsUuqjsrnsYVP+rJYmixPU6F28NW/oV/mH35b66RVtjIpUCqOE+PEbB8JA4D95n00ui6oHfPx/uu+L0D69msMewim5yIloz+/Df6ohgZfNH1/p3IsjKrBJn/UKVtv34O2GNFhvbqoehzBxAS2N3JeFDHN02"'
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    die($response);

});

Route::get('/shopee_conversations', function () {

    $conversations = collect(json_decode(file_get_contents('conversations.json'), true));

    try {
        $client = (new \GuzzleHttp\Client)->request('POST', 'https://seller.shopee.co.id/webchat/api/v1.2/mini/login?source=sc&_uid=0-373067965&_v=5.1.2&_api_source=sc', [
            'headers' => [
                'cookie' => 'SPC_F=bAOSNo5BVzySx2Q31pd5iodEvH2C7aKt; _gcl_au=1.1.409325345.1615897853; _fbp=fb.2.1615897853748.1788631719; G_ENABLED_IDPS=google; SPC_CLIENTID=YkFPU05vNUJWenlTxkjmauqaxlsihzci; UYOMAPJWEMDGJ=; SPC_IVS=; SPC_SC_SA_TK=; SC_SSO_U=-; SPC_SC_SA_UD=; SPC_U=373067965; SC_SSO=-; SPC_CDS=fa0b5a2b-a4a8-4466-a4cd-d72a030fb192; SPC_R_T_ID="NJMKHgc2dcTbgx1Sk+TewEQhVunqg+Lh4bbQ/FbR4elVJ6hTyTX+YJBYDrEn2c1Y0i7zZIkpL+mNkmkKXZvnIJxw/lAUKzwlctmoNwHKhVE="; SPC_R_T_IV="BcK5NLM9yN5KStZgA1RFkg=="; _ga=GA1.3.1802597297.1615897862; _ga_SW6D8G0HXK=GS1.1.1617751893.16.1.1617752517.60; SC_DFP=xCm1L65svs27OMqqZbfGuBfeokK1nauA; SPC_EC="hJVZDDH0awMGHaJYmjX1bN8uYUvOVDwVlKeCd/kLfyDTbnHSJ/zRQu4YaVW3ZDrGinRdpGGMGEoK1fpkWrfyVB0BiqT/FyRvaFQsfDjEXp1HynzyMS8iTy4rN00XcshiEyY09MluUyAUej9dgjUR3mTvlhrr5pJL+aL4v7+ZnBstDck0ThMCx+gxiwatHhlu"; SPC_STK="/h+MDY3sR6ff5wNuqnYi1EMTPEVv2uh2Aaqaqc7APUQzztyQjWLQpNdk7tdd8Jn2jElxPe0zuyCJbJoFiNm9eRP5rUfe/KMGwQDBnxBMMc64ddY36IRPsr/Uq63UFxclcMS8jA+qXLhzT+FCsvsbvLhYkzAHsKDOLFIbVyWEl8rQZcynWP1+xMKQiC1TQ+0h"; SPC_SC_TK=3d1a938fdc265e917d4fa7124a3cf9d4; SPC_SC_UD=373067965; SPC_WST="hJVZDDH0awMGHaJYmjX1bN8uYUvOVDwVlKeCd/kLfyDTbnHSJ/zRQu4YaVW3ZDrGinRdpGGMGEoK1fpkWrfyVB0BiqT/FyRvaFQsfDjEXp1HynzyMS8iTy4rN00XcshiEyY09MluUyAUej9dgjUR3mTvlhrr5pJL+aL4v7+ZnBstDck0ThMCx+gxiwatHhlu"'
            ]
        ]);

        $token = json_decode($client->getBody()->getContents())->token;

        $client = (new \GuzzleHttp\Client)->request('GET', 'https://seller.shopee.co.id/webchat/api/v1.2/mini/conversations', [
            'headers' => [
                'authorization' => "Bearer $token"
            ]
        ]);
    } catch (\Throwable $t) {

//        (new \GuzzleHttp\Client)->request('GET', "https://selenium2.bikinaplikasi.dev/whatsapp_send_message/server.php?search_chat=6282282692489&message=token abiss,, gantii cuyyy");

        abort(401, 'Unauthorized');
        die;
    }

    $data = json_decode(
        json_encode(
            collect(
                json_decode(
                    $client->getBody()->getContents(), true
                )
            )->first()
        )
    );

    if (!$conversations->where('last_message_time', $data->last_message_time)->first()) {

        $conversations->push($data);

        file_put_contents('conversations.json', $conversations->toJson());

        try {
            file_put_contents("message.txt", "chat baru dari: $data->to_name, {$data->latest_message_content->text}");
            sleep(3000);
            file_put_contents("message.txt", "");
//            (new \GuzzleHttp\Client)->request('GET', "https://selenium2.bikinaplikasi.dev/whatsapp_send_message/server.php?search_chat=terabas store 2021&message=chat baru dari: $data->to_name, {$data->latest_message_content->text}");
        } catch (\Throwable $t) {
//            (new \GuzzleHttp\Client)->request('GET', "https://selenium2.bikinaplikasi.dev/whatsapp_send_message/server.php?search_chat=6282282692489&message=Gagal mengirim pesan boss..");

            file_put_contents("message.txt", "");
            die('Gagal mengirim pesan ' . $t->getMessage());
        }

        die('Adaa');
    }

    file_put_contents("message.txt", "");
    die("Tidak Ada");
});

Route::get('/tokopedia_conversations', function () {

    ini_set("memory_limit", "-1");

    $conversations = collect(json_decode(file_get_contents('tokopedia.json'), true));
    $body = '[{"operationName":"ChatListQuery","variables":{"page":1,"perPage":10,"order":"desc","platform":"desktop","filter":"all","tab":"tab-seller"},"query":"query ChatListQuery($tab: String, $filter: String, $page: Int = 1, $perPage: Int = 10, $order: String = \"desc\", $platform: String = \"mobile\") {\n  chatList: chatListMessage(tab: $tab, filter: $filter, page: $page, perPage: $perPage, order: $order, platform: $platform) {\n    list {\n      key: messageKey\n      messageId: msgID\n      attributes {\n        contact {\n          name\n          role\n          thumbnail\n          __typename\n        }\n        lastReplyMessage\n        lastReplyTime: lastReplyTimeStr\n        readStatus\n        unreads\n        pinStatus\n        isReplyByTopbot\n        __typename\n      }\n      __typename\n    }\n    hasNext\n    showTimeMachine\n    __typename\n  }\n}\n"},{"operationName":"ChatWhitelistFeature","variables":{},"query":"query ChatWhitelistFeature {\n  chatWhitelistFeature(feature: \"topbot\") {\n    isWhitelist\n    __typename\n  }\n}\n"}]';

    try {
        $client = (new \GuzzleHttp\Client)->request('POST', 'https://gql.tokopedia.com/', [
            'headers' => [
                'Cookie' => '_SID_Tokopedia_=T3bxlGa0XQme51g8vO4EUZTCNbXx6ulyeYQTfABUvgq6WDO1VhQZ1MNmXGlkTCLm4wtwdb3pcp4yHWCjYvY0mUeAkGKjEc671kxR1hgDvtfpV9JVq3PosIeKaJFTXJDW;_abck=2FBC94A5274A66C06EAF7562CE4B1DE6~-1~YAAQhHnqZyLPLNx4AQAA+GPUGAXFS6OtNtw6DhijAdu3BPnbEz49J7d5oDjdAweIkbUHrn1DdcEpMy/lpqIHO2NhCOb6iTVe7KVb27ErssgzKgLuNi3vKCkMfxuE3uRIr9pXZ2WovBT2zapYIhOpwhQfUogKKlPT/7TwJ030u5fHeCaJLkSIWJBEtLXGZYBLnFxVCF2kYezVV/gJBCYKOyHynOuY5261Op83FDp3HYD8N3cVvkjrQ7JleIZGfRgrg/4gPif4pM6MNFBoOQzvuwJf2+r1WiziMUoVZIHA9Se3WSm6r7sN2samfTmArso73kTzbqxllZ5cS/hvlHyuP8kBar91Rly4jCPjeETivGs=~-1~-1~-1; bm_sz=5B8DB4D0A438A1A32251A5A8F8CCA126~YAAQrXnqZ8Bsog55AQAAU3SQGAtbRLhVilukNLc/oAk+BrKyhPIHa9CFb4QYx9V8s9oFmDDiObemeeH7p8l3QXak4RrMNJZ0UP/4MA6Cki1vG5OO5sOk+ohPMhycz1aMfL6QxWe5t2C8k0NcTexSFImub6xIqM232pZLOHpB+AS/PIu4zFmwLwM6YvIM8e88h14c',
                'Cache-Control' => "no-cache",
                "Content-Type" => "application/json",
                'Content-Length' => strlen(strlen($body)),
                "Host" => "gql.tokopedia.com",
                "User-Agent" => "PostmanRuntime/7.26.10",
                "Accept" => "*/*",
//                "Accept-Encoding" => "gzip, deflate, br",
                "Connection" => "keep-alive",
            ],
            'body' => $body,
            'verify' => false
        ]);

    } catch (\Throwable $t) {

//        (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+6282282692489&text=(Tokopedia) token abiss,, gantii cuyyy&apikey=261906");

        die($t->getMessage());
        abort(401, 'Unauthorized');
    }

    $data = json_decode(
        json_encode(
            collect(
                json_decode(
                    $client->getBody()->getContents(), true
                )
            )->first()
        )
    );

    //header("Content-Type: application/json");
    if (!$conversations->where('attributes.lastReplyTime', $data->data->chatList->list[0]->attributes->lastReplyTime)->first()) {

        $conversations->push($data->data->chatList->list[0]);
        file_put_contents('tokopedia.json', $conversations->toJson());

        try {
            (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+6283893451222&text=(Tokopedia) chat baru dari: {$data->data->chatList->list[0]->attributes->contact->name}, {$data->data->chatList->list[0]->attributes->lastReplyMessage}&apikey=762566");
            (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+62895622007052&text=(Tokopedia) chat baru dari: {$data->data->chatList->list[0]->attributes->contact->name}, {$data->data->chatList->list[0]->attributes->lastReplyMessage}&apikey=528718");
            (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+6282282692489&text=(Tokopedia) chat baru dari: {$data->data->chatList->list[0]->attributes->contact->name}, {$data->data->chatList->list[0]->attributes->lastReplyMessage}&apikey=261906");
        } catch (\Throwable $t) {
            (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+6282282692489&text=(Tokopedia) Gagal mengirim pesan boss..&apikey=261906");

            die('gagal mengirim pesan, ' . $t->getMessage());
        }

        die('adaa');
    }
});

Route::get('/instagram_conversations', function () {

    $sessionid = \DB::connection("social_app")->table('instagram_accounts')->where([
        'username' => request()->username,
        'password' => request()->password
    ])->first()->sessionid;

    $conversations = collect(json_decode(file_get_contents('inbox.json'), true));
    try {

        $client = (new \GuzzleHttp\Client)->request('GET', 'https://i.instagram.com/api/v1/direct_v2/inbox/?persistentBadging=true&folder=&limit=1&thread_message_limit=1', [
            'headers' => [
                'cookie' => "shbid=19482; shbts=1617974251.7299142; mid=YHBT6wALAAEu147ugQDI8tUbYInO; ig_did=F5F944A8-5D63-4D89-BF3E-E9221D6BBB53; rur=ASH; fbm_124024574287414=base_domain=.instagram.com; ig_nrcb=1; csrftoken=; ds_user_id=2211561018; sessionid=$sessionid; fbsr_124024574287414=XYuq0fIXUlEqFEZSIw-IPyWgYMeQY-3cocR7TI4MbbM.eyJ1c2VyX2lkIjoiMTAwMDAzMzY3MzQ1NTEyIiwiY29kZSI6IkFRQU9wQ2czUFd3WmlyUmZtc3pKX2ludV9VYlphbEhneW51RlZLcXkwbmRGRFFROExuSzBuTmZGLWZSX3FmajFJbDQ3Z3lXdmE4TEJHMjVGQmJ4U2tVSVRPWnR3dldBMl9TdmhzLVFvRmFyVmVRWUxZWDB1S0lfTUVYbWV5ZWIycGp2Sl81Z2hrN1RSWldQY3EwMmU4RnFYUENlbkVWaTlHUUVhQl9KM0JWeVFlb3I5aW83QWVPLVdfWEl0NTg1WnZ5UkRmTnhfZ0JTem9yN19MeGxKNFRyTnBXYldfTDhHX0hTNXFZVzRfRFdDYnc0cWVjbnl3TVZNVEduM3pqZ2VqcldCa21fUU12Y0NWeVhub0lJM2xmaWYtS2w0b2pKZDNIbGlfYTRuQllUd1dKRmR5eUFObGxiV0xLQllFT050MDh2WVhVSHJPLXNwUWZZZm1oaFV2UkNsIiwib2F1dGhfdG9rZW4iOiJFQUFCd3pMaXhuallCQUM2eVBxWEJGRkxMNVJRWkNNNGx2YXAxRlJsdmVKNUhBaE5mVUJIR2JDa2U4ek5Sc0lXbXhXYTFoYndPWXUxNGxCaVpBbUNDNng5ZEhyVDNTRHNER1pDa2FOdWhpb3owNjhJS3R6NlBidmFSYU5LV2ZvWDFReU41SHY1dVhwUFQ4bG5LQk9zdjBSWTNtWGx0TmxTQ2pTU2ozYzJPQW51Smx0UUlIUVMiLCJhbGdvcml0aG0iOiJITUFDLVNIQTI1NiIsImlzc3VlZF9hdCI6MTYxNzk3ODUzNH0",
                'x-ig-app-id' => '936619743392459'
            ]
        ]);
    } catch (\Throwable $t) {

        (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+6282282692489&text=(ig) cookie abiss,, gantii cuyyy&apikey=261906, error: " . $t->getMessage());

        abort(401, "Unauthorized, {$t->getMessage()}");
        die;
    }

    $data = json_decode(
        json_encode(
            collect(
                json_decode(
                    $client->getBody()->getContents()
                )->inbox->threads[0]->items
            )->first()
        )
    );

    if (!$conversations->where('timestamp', $data->timestamp)->first()) {

        $conversations->push($data);

        file_put_contents('inbox.json', $conversations->toJson());

        try {
            (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+6282282692489&text=(ig) chat baru: $data->text&apikey=762566");
            (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+6282282692489&text=(ig) chat baru: $data->text&apikey=528718");
            (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+6282282692489&text=(ig) chat baru: $data->text&apikey=261906");
        } catch (\Throwable $t) {
            (new \GuzzleHttp\Client)->request('GET', "https://api.callmebot.com/whatsapp.php?phone=+6282282692489&text=(ig) Gagal mengirim pesan boss..&apikey=261906");

            die('gagal mengirim pesan');
        }

        die('adaa');
    }

    die("gak ada..");
});


Route::get('/', function (\Illuminate\Http\Request $request) {
    if($request->server('HTTP_HOST') == 'www.bikinaplikasi.dev') {
        header('location: https://bikinaplikasi.dev');
    }

    return view('index');
})->name('index');

Route::get('home/berita/{berita}', function (Berita $berita) {

    $data["item"] = $berita;
    $data["berita"] = $berita;

    return view('berita', $data);
})->name('home.berita.show');

Route::get('/auth/redirect', function () {

    return Socialite::driver('github')->redirect();
});

Route::post('register_user', [UserController::class, 'register_user'])->name('register_user');
Route::get('admin/cek_kode_voucher', [\App\Http\Controllers\VoucherController::class, 'cek_kode_voucher'])->name('cek_kode_voucher');
Route::get('auth/redirect/{provider}', function ($provider) {

    return Socialite::driver($provider)->redirect();
});

Route::get('auth/callback/{provider}', function ($provider) {

    try {
        $user = Socialite::driver($provider)->user();

        $requestData = [
            'username' => $user->user['email'],
            'password' => null,
            'name' => 'user ' . $user->id,
            'email' => $user->user['email'],
            'avatar' => $user->avatar,
            'saldo' => 0,
            'provider' => $provider,
            'socialite_id' => $user->id
        ];

    } catch (\Throwable $t) {

        return redirect('/');
    }

    // kalo usernya belum teregistrasi maka registrasikan, jika sudah langsung loginkan saja
    if (!\App\Models\AdminUser::orWhere('username', $requestData['username'])->orWhere('email', $requestData['email'])->first()) {

        \DB::transaction(function () use ($requestData) {
            $adminCreate = \App\Models\AdminUser::create($requestData);

            \App\Models\AdminRoleUser::create([
                'role_id' => 3,
                'user_id' => $adminCreate->id
            ]);

            \App\Models\AdminUserPermission::create([
                'permission_id' => 6,
                'user_id' => $adminCreate->id
            ]);

            if (\Cookie::get('r')) {

                \App\Models\Rujukan::create([
                    'user_admin_id' => \Cookie::get('r'),
                    'user_admin_id_r' => $adminCreate->id
                ]);
            }

            \Cookie::forget('r');
            \Cookie::forget('register_attemps');
        });
    }

    if (auth()->guard('admin')->loginUsingId(\App\Models\AdminUser::where('email', $user->user['email'])->get()->last()->id)) {
        admin_toastr('Berhasil masuk!', 'success');

        return redirect('admin');
    }

    return redirect('/');
});
Route::post('login_manual', [LoginController::class, 'authenticate'])->name('login_manual');
Route::get('forgot_password', [LoginController::class, 'forgot_password'])->name('forgot_password');
Route::get('reset_password', [LoginController::class, 'reset_password'])->name('reset_password');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('admin/tripay/callback', "\App\Http\Controllers\TripayController@callback")->name('admin.tripay.callback');
Route::get('r/{user_id}', [App\Http\Controllers\RController::class, 'r'])->name('r.user_id');
Route::get('remove_telescope_entries', function () {
    \DB::table('telescope_entries')->delete();
    \DB::table('telescope_entries_tags')->delete();
});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('/debug-sentry', function () {
    throw new Exception('My first Sentry error!');
});
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {

        $data['unit_kerjas'] = UnitKerja::all();
        $data['users'] = User::all();

        return view('dashboard', $data);

    })->name('dashboard');

    Route::get('jabatanx', Index::class)->name('jabatan.index');
    Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('ckeditor/upload', ['App\Http\Controllers\CKEditorController', 'upload']);
});

Route::get('verifikasi_permintaan_pembayaran', [\App\Admin\Controllers\PembayaranController::class, 'verifikasi_permintaan_pembayaran'])->name('verifikasi_permintaan_pembayaran');

Route::get('run_java', function () {
//    echo shell_exec("dir");
    $descriptorspec = array(
        array('pipe', 'r'),               // stdin
        array('file', 'myfile.txt', 'a'), // stdout
        array('pipe', 'w'),               // stderr
    );

    $username = \request()->username;
    $password = \request()->password;

//    echo system("java -jar selenium.jar $username $password");

    $proc = proc_open("java -Djava.awt.headless=true -jar whatsapp.jar $username $password", $descriptorspec, $pipes);

//   echo system('java -Djava.awt.headless=true -jar whatsapp.jar');

//   print_r($output);
});

//
//Auth::routes();

Route::get("testing", [\App\Http\Controllers\TestingController::class, "index"]);
Route::get("bot-trading/check-user-position", [\App\Http\Controllers\BotTradingController::class, "checkUserPosition"]);
Route::get("bot-trading/test", [\App\Http\Controllers\BotTradingController::class, "test"]);
Route::get("bot-trading/alerts", [\App\Http\Controllers\BotTradingController::class, "alerts"]);
Route::get("bot-trading/get-orders", [\App\Http\Controllers\BotTradingController::class, "getOrders"]);
Route::get("bot-trading/check-token-expired", [\App\Http\Controllers\BotTradingController::class, "checkTokenExpired"]);
Route::get("bot-trading/position", [\App\Http\Controllers\BotTradingController::class, "position"]);
Route::get("bot-trading/send-telegram-message", [\App\Http\Controllers\BotTradingController::class, "sendTelegramMessage"]);
Route::get("bot-trading/send-telegram-message-2", [\App\Http\Controllers\BotTradingController::class, "sendTelegramMessage2"]);
Route::get("bot-trading/call-telegram-message", [\App\Http\Controllers\BotTradingController::class, "callTelegramMessage"]);
Route::get("bot-trading/token-expired", [\App\Http\Controllers\BotTradingController::class, "tokenExpired"]);
Route::get("bot-trading/set-bep", [\App\Http\Controllers\BotTradingController::class, "setBep"]);
Route::get("bot-trading/cancel-order", [\App\Http\Controllers\BotTradingController::class, "cancelOrder"]);

Route::get("bot-trading/cek-server", [\App\Http\Controllers\BotTradingController::class, "cekServer"]);
Route::get("bot-trading/start-instance", [\App\Http\Controllers\BotTradingController::class, "startInstance"]);
Route::get("bot-trading/start-instance-server", [\App\Http\Controllers\BotTradingController::class, "startInstanceServer"]);
Route::get("bot-trading/stop-instance", [\App\Http\Controllers\BotTradingController::class, "stopInstance"]);
Route::get("bot-trading/ganti-token", [\App\Http\Controllers\BotTradingController::class, "gantiToken"]);
Route::get("bot-trading/ganti-margin", [\App\Http\Controllers\BotTradingController::class, "gantiMargin"]);
Route::get("bot-trading/update-margin", [\App\Http\Controllers\BotTradingController::class, "updateMargin"]);
//
Route::get("bot-trading/check-saldo", [\App\Http\Controllers\BotTradingController::class, "checkSaldo"]);
Route::get("bot-trading/check-js-is-active", [\App\Http\Controllers\BotTradingController::class, "checkJsIsActive"]);
Route::get("bot-trading/get-spread", [\App\Http\Controllers\BotTradingController::class, "getSpread"]);

//


Route::get('/listing-program', function () {
    $zipFile = "listing-program.zip";
    $zipArchive = new ZipArchive();

    if ($zipArchive->open($zipFile, (ZipArchive::CREATE | ZipArchive::OVERWRITE)) !== true)
        die("Failed to create archive\n");

    // Controllers
    foreach (glob(base_path('app/http/Controllers') . "/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('app/http/Controllers') . "/*/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('app/http/Controllers') . "/*/*/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    // Routes
    foreach (glob(base_path('routes') . "/web.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('routes') . "/api.php") as $item) {

        $zipArchive->addFile($item);
    }


    // Views
    $exclude_folder = '/layouts|vendor|errors/';
    foreach (glob(base_path('resources/views') . "/*.php") as $item) {

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('resources/views') . "/*/*.php") as $item) {

        if(preg_match($exclude_folder, $item)) continue;

        $zipArchive->addFile($item);
    }

    foreach (glob(base_path('resources/views') . "/*/*/*.php") as $item) {

        if(preg_match($exclude_folder, $item)) continue;

        $zipArchive->addFile($item);
    }

    if ($zipArchive->status != ZIPARCHIVE::ER_OK)
        echo "Failed to write files to zip\n";

    $zipArchive->close();

    return redirect('listing-program.zip');
});
