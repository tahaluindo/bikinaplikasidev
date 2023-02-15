$(document).ready(() => {

// 0 * * * * /usr/local/CyberCP/bin/python /usr/local/CyberCP/plogical/findBWUsage.py >/dev/null 2>&1
// 0 * * * * /usr/local/CyberCP/bin/python /usr/local/CyberCP/postfixSenderPolicy/client.py hourlyCleanup >/dev/null 2>&1
// 0 0 1 * * /usr/local/CyberCP/bin/python /usr/local/CyberCP/postfixSenderPolicy/client.py monthlyCleanup >/dev/null 2>&1
// 0 2 * * * /usr/local/CyberCP/bin/python /usr/local/CyberCP/plogical/upgradeCritical.py >/dev/null 2>&1
// 0 2 * * * /usr/local/CyberCP/bin/python /usr/local/CyberCP/plogical/renew.py >/dev/null 2>&1
// 7 0 * * * "/root/.acme.sh"/acme.sh --cron --home "/root/.acme.sh" > /dev/null
// 0 0 * * * /usr/local/CyberCP/bin/python /usr/local/CyberCP/IncBackups/IncScheduler.py Daily
// 0 0 * * 0 /usr/local/CyberCP/bin/python /usr/local/CyberCP/IncBackups/IncScheduler.py Weekly
// */3 * * * * if ! find /home/*/public_html/ -maxdepth 2 -type f -newer /usr/local/lsws/cgid -name '.htaccess' -exec false {} +; then systemctl r>
// 09,39 * * * * /usr/local/CyberCP/bin/cleansessions >/dev/null 2>&1
// 1 * * * * sudo curl https://vps-ramdan.bikinaplikasi.dev/public/bot-trading/set-bep
// 1 * * * * sudo curl https://vps-ramdan.bikinaplikasi.dev/public/bot-trading/cancel-order
// * * * * * php /home/vps-ramdan.bikinaplikasi.dev/public_html/restart.php
// @reboot /home/vps-ramdan.bikinaplikasi.dev/public_html/restart

    host = "http://localhost:3000/bot-trading";
    // host = "https://server1.bikinaplikasi.dev/public/bot-trading";
    pair = $('#header-toolbar-symbol-search > div:nth-child(1)').text();
    order_type = null;
    tokenHasExpired = false;
    attributesToOpenPosition = {};
    timeBefore = null;
    timeDetect = null;
    logicName = null;

    settings = {
        callTelegramMessageRepeat: 2,
        chartTimeframe: 15,
        coin_id: 22,
        delayAudioPlay: 5000,
        delayInSecondToOpenPosition: 0,
        delayToCheckToken: 30000,
        delayToNextDetection: 120000,
        intervalToCheckLogic: 300,
        leverage: 10,
        linkToCallTelegramMessage: host + "/call-telegram-message",
        linkToOpenPosition: host + "/position",
        linkToSendTelegramMessage: host + "/send-telegram-message",
        linkToSendTelegramMessage2: host + "/send-telegram-message-2",
        linkToTellTokenExpired: host + "/token-expired",
        urlSetBep: host + "/set-bep",
        urlCancelOrder: host + "/cancel-order",
        margin: 12.57,
        messageAttributesFailToGet: "Attribute gagal didapatkan",
        messageClassNameHasChange: 'Nama class telah diganti, silakan update manual',
        messageHaveClosePosition: `Posisi untuk pair ${pair} telah ditutup`,
        messageHaveErrorClosePosition: `Terjadi untuk pair ${pair} saat menutup posisi`,
        messageHaveErrorOpenPosition: `Terjadi untuk pair ${pair} saat membuka posisi`,
        messageHaveOpenPosition: `Posisi untuk pair ${pair} berhasil dibuka`,
        messageHaveSuccessSendCallTelegramMessage: `Berhasil mengirimkan pesan telepon ke telegram`,
        messageHaveSuccessSendTelegramMessage: `Berhasil mengirimkan pesan ke telegram`,
        messageTimeToOpenPosition: "time to open position ",
        messageToGetAttributes: "Sedang mendapatkan attributes",
        messageTokenHasExpired: "Token sudah expired mohon update secara manual",
        messageWillBeOpenPositionAt: "Posisi akan segera dibuka pada: ",
        numOfSoundNotice: 3,
        numOfTelegramCallNotice: 2,
        stop_loss_rate: 15,
        take_profit_rate: 60,
        telegram_id: "ramdanriawan",
        toBep_rate: 20,
        addedPoints: 0.000,
        token_bearer: "eyJhbGciOiJIUzUxMiJ9.eyJzdWIiOiI5MTY4NTU2MzA4MjI5NTcwNTgiLCJleHAiOjE2NTI1NDg4Mjl9.tn54X3Vq81YwFOI39t4g_PAMjRNSWZ11F0LKXH279U8zAzsVbk5dcAHucF4akKXYcv6rSUqYsdnfuxathpdjJg",
    }

    // price o
    chart_price_o = null;

    // price h
    chart_price_h = null;

    // price l
    chart_price_l = null;

    // price c
    chart_price_c = null;

    // psr blue 1
    chart_psr_blue_1 = null;

    // psr blue 2
    chart_psr_blue_2 = null;

    // psr blue 3
    chart_psr_blue_3 = null;

    // psr blue 4
    chart_psr_blue_4 = null;

    // bb sma 42
    chart_bb_sma_42 = null;

    // macd
    chart_macd_signal = null;

    async function cekBearerToken() {
        await fetch("https://api-app.cmlucky.com/api/v1/users/info", {
            "credentials": "include",
            "headers": {
                "User-Agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0",
                "Accept": "application/json, text/plain, */*",
                "Accept-Language": "en-US,en;q=0.5",
                "Authorization": `Bearer ${settings.token_bearer}`,
                "device_id": "2b97ef90-30ee-11ec-88fd-d3f61af02d3c",
                "platformId": "30",
                "channel": "official",
                "app_version": "4.6.10",
                "lang": "en",
                "appId": "30004",
                "mainAppId": "10009",
                "Timestamp": "1634656059800",
                "traceId": "e847a639-7ec7-444a-ab97-818e7804a679",
                "Sign": "0B5B21BCFE99015F61E6A7E4F3495F5C3FB3B4C3E05191467559FC36AF8A2BE1",
                "Sec-Fetch-Dest": "empty",
                "Sec-Fetch-Mode": "cors",
                "Sec-Fetch-Site": "cross-site"
            },
            "method": "GET",
            "mode": "cors"
        }).then((response) => response.json()).then((response) => {
            if (response.code !== 0) {
                tokenHasExpired = true;
                callTelegramMessage(settings.messageTokenHasExpired);
                play();
            }
        });
    }

    function getTimeToOpenPosition() {
        const date = new Date();

        const beforeMinutes = parseInt(date.getMinutes() / settings.chartTimeframe) * settings.chartTimeframe;
        date.setMinutes(beforeMinutes + settings.chartTimeframe)

        date.setSeconds(-(settings.delayInSecondToOpenPosition));

        console.log(settings.messageTimeToOpenPosition + date.toLocaleString())

        const dateBefore = new Date();
        dateBefore.setMinutes(beforeMinutes - settings.chartTimeframe);
        dateBefore.setSeconds(0);

        timeBefore = dateBefore.toLocaleString();

        const dateDetect = new Date();
        dateDetect.setMinutes(beforeMinutes);
        dateDetect.setSeconds(0);

        timeDetect = dateDetect.toLocaleString();

        return date.toLocaleString();
    }

    function callTelegramMessage(message) {
        let data = {
            telegram_id: settings.telegram_id,
            message: message,
            repeat: settings.callTelegramMessageRepeat
        }

        window.open(settings.linkToCallTelegramMessage + "?" + $.param(data))
    }

    function getAttributesToOpenPosition() {
        console.log(settings.messageToGetAttributes)

        let attributesToOpenPosition = {
            timeBefore: timeBefore,
            timeDetect: timeDetect,
            timeToOpenPosition: getTimeToOpenPosition(),
            token_bearer: settings.token_bearer,
            numOfTelegramCallNotice: settings.numOfTelegramCallNotice,
            pair: pair,
            coin_id: settings.coin_id,
            margin: settings.margin,
            leverage: settings.leverage,
            order_type: order_type,
            price: null,
            stop_loss_rate: null,
            take_profit_rate: null,
            toBep_rate: null,
            logicName: logicName
        }

        if (order_type == 0) {

            attributesToOpenPosition.price = chart_price_c + settings.addedPoints;
        } else {
            attributesToOpenPosition.price = chart_price_c - settings.addedPoints;
        }

        attributesToOpenPosition.stop_loss_rate = settings.stop_loss_rate;
        attributesToOpenPosition.take_profit_rate = settings.take_profit_rate;
        attributesToOpenPosition.toBep_rate = settings.toBep_rate;

        return attributesToOpenPosition;
    }

    function openPosition(attributesToOpenPosition) {
        console.log(settings.messageWillBeOpenPositionAt + attributesToOpenPosition.timeToOpenPosition)

        window.open(settings.linkToOpenPosition + "?" + $.param(attributesToOpenPosition));
    }

// untuk melakukan update angka sekaligus mengecek apakah selector udah terganti apa belum
    function updateAngka() {
        if ($('.series-OYqjX7Sg > div:nth-child(2) > div:nth-child(1) > div:nth-child(2) > div:nth-child(2)').length < 1) {
            callTelegramMessage(settings.messageClassNameHasChange);

            return;
        }

        // price o
        chart_price_o = parseFloat($('.series-OYqjX7Sg > div:nth-child(2) > div:nth-child(1) > div:nth-child(2) > div:nth-child(2)').text());

        // price h
        chart_price_h = parseFloat($('.series-OYqjX7Sg > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > div:nth-child(2)').text());

        // price l
        chart_price_l = parseFloat($('.series-OYqjX7Sg > div:nth-child(2) > div:nth-child(1) > div:nth-child(4) > div:nth-child(2)').text());

        // price c
        chart_price_c = parseFloat($('.series-OYqjX7Sg > div:nth-child(2) > div:nth-child(1) > div:nth-child(5) > div:nth-child(2)').text());

        // psr blue
        chart_psr_blue_1 = $('.valueItem-OYqjX7Sg').eq(9).text();

        // psr blue
        chart_psr_blue_2 = $('.valueItem-OYqjX7Sg').eq(10).text();

        // psr blue
        chart_psr_blue_3 = $('.valueItem-OYqjX7Sg').eq(11).text();

        // psr blue
        chart_psr_blue_4 = $('.valueItem-OYqjX7Sg').eq(12).text();

        // bb sma 42
        chart_bb_sma_42 = parseFloat($('div.item-OYqjX7Sg:nth-child(3) > div:nth-child(2) > div:nth-child(1) > div:nth-child(1)').text());

        // macd
        chart_macd_signal = $('div.sourcesWrapper-OYqjX7Sg:nth-child(1) > div:nth-child(2) > div:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(3) > div:nth-child(1)').text();
        chart_macd_cross = $('div.sourcesWrapper-OYqjX7Sg:nth-child(1) > div:nth-child(2) > div:nth-child(2) > div:nth-child(2) > div:nth-child(1) > div:nth-child(4) > div:nth-child(1)').text();
    }

    function play() {
        let audio = new Audio('https://media.geeksforgeeks.org/wp-content/uploads/20190531135120/beep.mp3');

        for (let i = 0; i < settings.numOfSoundNotice; i++) {

            setTimeout(() => {

                audio.play();
            }, settings.delayAudioPlay * i);
        }
    }

// harga menyentuh parabolic sar, lalu sma 42 berada di antara open and close harga, macd masih merah / hijau / baru mau berpotongan
    function isLogic1() {
        logicName = "isLogic1";

        // mendeteksi harga akan turun
        if (chart_psr_blue_2 === 'n/a' && chart_psr_blue_4 != 'n/a' && chart_psr_blue_1 >= chart_price_l && ((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("") < 0 && chart_macd_cross === 'n/a') || (chart_macd_signal.toLowerCase().indexOf("−") >= 0 && chart_macd_cross !== 'n/a'))) {
            console.log("is logic 1 true sell")

            order_type = 1;

            return true;
        }

        // mendeteksi harga akan naik
        if (chart_psr_blue_2 !== 'n/a' && chart_psr_blue_4 === 'n/a' && chart_psr_blue_1 <= chart_price_l && ((chart_price_o <= chart_bb_sma_42 && chart_price_c >= chart_bb_sma_42) || (chart_price_c <= chart_bb_sma_42 && chart_price_o >= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("−") >= 0 && chart_macd_cross === 'n/a') || (chart_macd_signal.toLowerCase().indexOf("-") < 0 && chart_macd_cross !== 'n/a'))) {
            console.log("is logic 1 true buy")

            order_type = 0;

            return true;
        }

        return false;
    }


    function psr_sell_macd_blue_bb_between_macd_blue() {
        updateAngka();
        logicName = "psr_sell_macd_blue_bb_between_macd_blue";

        // mendeteksi harga akan turun
        if ((chart_psr_blue_2 === 'n/a' && chart_psr_blue_4 !== 'n/a' && chart_psr_blue_1 >= chart_price_h && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross === 'n/a'))) && ((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross === 'n/a'))) {
            console.log("psr_sell_macd_blue_bb_between_macd_blue")

            order_type = 1;

            return true;
        }

        return false;
    }

    function psr_buy_macd_red_bb_between_macd_red() {
        updateAngka();
        logicName = "psr_buy_macd_red_bb_between_macd_red";

        // mendeteksi harga akan naik
        if ((chart_psr_blue_2 !== 'n/a' && chart_psr_blue_4 === 'n/a' && chart_psr_blue_1 <= chart_price_l && ((chart_macd_signal.toLowerCase().indexOf("−") >= 0 && chart_macd_cross === 'n/a'))) && ((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("") >= 0 && chart_macd_cross === 'n/a'))) {
            console.log("psr_buy_macd_red_bb_between_macd_red")

            order_type = 0;

            return true;
        }

        return false;
    }

    function psr_buy_macd_blue_bb_between_macd_blue() {
        updateAngka();
        logicName = "psr_buy_macd_blue_bb_between_macd_blue";

        // mendeteksi harga akan naik
        if (chart_psr_blue_2 !== 'n/a' && chart_psr_blue_4 === 'n/a' && chart_psr_blue_1 <= chart_price_l && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross === 'n/a')) && ((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross === 'n/a'))) {
            console.log("psr_buy_macd_blue_bb_between_macd_blue")

            order_type = 1;

            return true;
        }

        return false;
    }

    function psr_sell_macd_red_bb_between_macd_red() {
        updateAngka();
        logicName = "psr_sell_macd_red_bb_between_macd_red";

        // mendeteksi harga akan turun
        if (((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("") >= 0 && chart_macd_cross === 'n/a')) && chart_psr_blue_2 === 'n/a' && chart_psr_blue_4 !== 'n/a' && chart_psr_blue_1 >= chart_price_l && ((chart_macd_signal.toLowerCase().indexOf("−") >= 0 && chart_macd_cross === 'n/a'))) {
            console.log("psr_sell_macd_red_bb_between_macd_red")

            order_type = 0;

            return true;
        }

        return false;
    }

// mengecek apakah parabolicnya udah berganti ke buy dan macd nya masih merah
    function psr_buy_macd_red() {
        updateAngka();
        logicName = "psr_buy_macd_red";

        // mendeteksi harga akan naik
        if (chart_psr_blue_2 !== 'n/a' && chart_psr_blue_4 === 'n/a' && chart_psr_blue_1 <= chart_price_l && ((chart_macd_signal.toLowerCase().indexOf("−") >= 0 && chart_macd_cross === 'n/a'))) {
            console.log("psr_buy_macd_red")

            order_type = 0;

            return true;
        }

        return false;
    }

// mengecek apakah parabolicnya udah berganti ke buy dan macd nya lagi crossing
    function psr_buy_macd_cross() {
        updateAngka();
        logicName = "psr_buy_macd_cross";

        // mendeteksi harga akan naik
        if (chart_psr_blue_2 !== 'n/a' && chart_psr_blue_4 === 'n/a' && chart_psr_blue_1 <= chart_price_l && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross !== 'n/a'))) {
            console.log("psr_buy_macd_cross")

            order_type = 0;

            return true;
        }

        return false;
    }

// mengecek apakah parabolicnya udah berganti ke buy dan macd nya lagi warna biru
    function psr_buy_macd_blue() {
        updateAngka();
        logicName = "psr_buy_macd_blue";

        // mendeteksi harga akan naik
        if (chart_psr_blue_2 !== 'n/a' && chart_psr_blue_4 === 'n/a' && chart_psr_blue_1 <= chart_price_l && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross === 'n/a'))) {
            console.log("psr_buy_macd_blue")

            order_type = 0;

            return true;
        }

        return false;
    }

// mengecek apakah parabolicnya udah berganti ke sell dan macd nya masih blue
    function psr_sell_macd_blue() {
        updateAngka();
        logicName = "psr_sell_macd_blue";

        // mendeteksi harga akan turun
        if (chart_psr_blue_2 === 'n/a' && chart_psr_blue_4 !== 'n/a' && chart_psr_blue_1 >= chart_price_h && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross === 'n/a'))) {
            console.log("psr_sell_macd_blue")

            order_type = 1;

            return true;
        }

        return false;
    }

    function psr_sell_macd_cross_bb_between_macd_cross_to_blue() {
        updateAngka();
        logicName = "psr_sell_macd_cross_bb_between_macd_cross_to_blue";

        // mendeteksi harga akan turun
        if ((chart_psr_blue_2 === 'n/a' && chart_psr_blue_4 !== 'n/a' && chart_psr_blue_1 >= chart_price_l && ((chart_macd_signal.toLowerCase().indexOf("") >= 0 && chart_macd_cross !== 'n/a'))) && ((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross !== 'n/a'))) {
            console.log("psr_sell_macd_cross_bb_between_macd_cross_to_blue")

            order_type = 1;

            return true;
        }

        return false;
    }


// mengecek apakah parabolicnya udah berganti ke sell dan macd nya lagi crossing
    function psr_sell_macd_cross() {
        updateAngka();
        logicName = "psr_sell_macd_cross";

        // mendeteksi harga akan turun
        if (chart_psr_blue_2 === 'n/a' && chart_psr_blue_4 !== 'n/a' && chart_psr_blue_1 >= chart_price_l && ((chart_macd_signal.toLowerCase().indexOf("") >= 0 && chart_macd_cross !== 'n/a'))) {
            console.log("psr_sell_macd_cross")

            order_type = 1;

            return true;
        }

        return false;
    }

// mengecek apakah parabolicnya udah berganti ke sell dan macd nya lagi warna merah
    function psr_sell_macd_red() {
        updateAngka();
        logicName = "psr_sell_macd_red";

        // mendeteksi harga akan naik
        if (chart_psr_blue_2 === 'n/a' && chart_psr_blue_4 !== 'n/a' && chart_psr_blue_1 >= chart_price_l && ((chart_macd_signal.toLowerCase().indexOf("−") >= 0 && chart_macd_cross === 'n/a'))) {
            console.log("psr_sell_macd_red")

            order_type = 1;

            return true;
        }

        return false;
    }

// mengecek  dan macd nya masih blue
    function bb_between_macd_blue() {
        updateAngka();
        logicName = "bb_between_macd_blue";

        // mendeteksi harga akan naik
        if (((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross === 'n/a'))) {
            console.log("bb_between_macd_blue")

            order_type = 0;

            return true;
        }

        return false;
    }

    // mengecek  dan macd nya crossing dari merah mau ke blue
    function bb_between_macd_cross_to_blue() {
        updateAngka();
        logicName = "bb_between_macd_cross_to_blue";

        // mendeteksi harga akan naik
        if (((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("−") < 0 && chart_macd_cross !== 'n/a'))) {
            console.log("bb_between_macd_cross_to_blue")

            order_type = 0;

            return true;
        }

        return false;
    }

    // mengecek  dan macd nya crossing dari blue mau ke merah
    function bb_between_macd_cross_to_red() {
        updateAngka();
        logicName = "bb_between_macd_cross_to_red";

        // mendeteksi harga akan naik
        if (((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("−") >= 0 && chart_macd_cross !== 'n/a'))) {
            console.log("bb_between_macd_cross_to_red")

            order_type = 1;

            return true;
        }

        return false;
    }

    // mengecek bb dan macd nya masih merah
    function bb_between_macd_red() {
        updateAngka();
        logicName = "bb_between_macd_red";

        // mendeteksi harga akan naik
        if (((chart_price_o >= chart_bb_sma_42 && chart_price_c <= chart_bb_sma_42) || (chart_price_c >= chart_bb_sma_42 && chart_price_o <= chart_bb_sma_42)) && ((chart_macd_signal.toLowerCase().indexOf("") >= 0 && chart_macd_cross === 'n/a'))) {
            console.log("bb_between_macd_red")

            order_type = 1;

            return true;
        }

        return false;
    }

    console.log(psr_sell_macd_cross_bb_between_macd_cross_to_blue());
    console.log(psr_buy_macd_red_bb_between_macd_red());
    console.log(psr_buy_macd_blue_bb_between_macd_blue());
    console.log(psr_buy_macd_red_bb_between_macd_red());
    console.log(psr_sell_macd_blue_bb_between_macd_blue());
    console.log(psr_buy_macd_red());
    console.log(psr_buy_macd_cross());
    console.log(psr_buy_macd_blue());
    console.log(psr_sell_macd_blue());
    console.log(psr_sell_macd_cross());
    console.log(psr_sell_macd_red());
    console.log(bb_between_macd_blue());
    console.log(bb_between_macd_cross_to_blue());
    console.log(bb_between_macd_cross_to_red());
    console.log(bb_between_macd_red());


    function startTrading() {
        let timeToOpenPosition = getTimeToOpenPosition();

        console.log("Posisi akan dicek pada: " + timeToOpenPosition);

        let intervalIsLogic = setInterval(async () => {
            updateAngka();
            var newDate = (new Date());
            newDate.setSeconds(0, 0);
            var waktuSekarang = newDate.toLocaleString();
            // await cekBearerToken();

            console.log("Waktu sekarang: " + waktuSekarang);
            console.log(settings.messageTimeToOpenPosition + timeToOpenPosition)

            if (tokenHasExpired) {

                clearInterval(intervalIsLogic);
                return;
            }

            if ((timeToOpenPosition === waktuSekarang) && (isLogic1() || psr_buy_macd_red_bb_between_macd_red() || psr_sell_macd_blue_bb_between_macd_blue() || psr_buy_macd_blue_bb_between_macd_blue() || psr_buy_macd_red_bb_between_macd_red() || psr_sell_macd_cross_bb_between_macd_cross_to_blue())) {
                clearInterval(intervalIsLogic);

                openPosition(getAttributesToOpenPosition());

                console.log(logicName)
                setTimeout(() => {

                    startTrading();
                }, settings.delayToNextDetection)
            } else if ((timeToOpenPosition === waktuSekarang) && (psr_buy_macd_red() || psr_buy_macd_cross() || psr_buy_macd_blue() || psr_sell_macd_blue() || psr_sell_macd_cross() || psr_sell_macd_red() ||
                bb_between_macd_blue() || bb_between_macd_cross_to_blue() || bb_between_macd_cross_to_red() || bb_between_macd_red())
            ) {
                clearInterval(intervalIsLogic);

                openPosition(getAttributesToOpenPosition());

                console.log(logicName)
                setTimeout(() => {

                    startTrading();
                }, settings.delayToNextDetection)
            }

            if ((newDate.getMinutes() === 0 || newDate.getMinutes() === 15 || newDate.getMinutes() === 30 || newDate.getMinutes() === 45) && (new Date()).getSeconds() > 15) {
                timeToOpenPosition = getTimeToOpenPosition();
            }

        }, settings.intervalToCheckLogic);
    }

    startTrading();
});
