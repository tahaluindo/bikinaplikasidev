function getCookie(cookieName) {
    let cookie = {};
    document.cookie.split(';').forEach(function (el) {
        let [key, value] = el.split('=');
        cookie[key.trim()] = value;
    })
    return cookie[cookieName];
}

var user_token = getCookie('user_token');

var theInterval = setInterval(async () => {
    var checkUserPosition = await fetch('https://bikinaplikasi.dev/bot-trading/check-user-position').then((response) => response.json());
    var stopProfitRate = 120;
    var stopLossRate = 30;

    if (checkUserPosition.type != undefined) {
        if (checkUserPosition.type == 'add_position') {
            stopProfitRate = 40;
            stopLossRate = 40;
        }
    }

    if (checkUserPosition.success == undefined) {

        await fetch("https://api-app.qq-os.com/api/v2/contract/order/open", {
            "headers": {
                "accept": "application/json, text/plain, */*",
                "accept-language": "en-US,en;q=0.9",
                "app_version": "4.59.13",
                "appid": "30004",
                "authorization": "Bearer " + user_token,
                "channel": "official",
                "content-type": "application/json",
                "device_id": "42407036-0e54-420c-b04c-3208aacec5e4",
                "lang": "en",
                "mainappid": "10009",
                "platformid": "30",
                "sec-ch-ua": "\"Not_A Brand\";v=\"99\", \"Microsoft Edge\";v=\"109\", \"Chromium\";v=\"109\"",
                "sec-ch-ua-mobile": "?0",
                "sec-ch-ua-platform": "\"Windows\"",
                "sec-fetch-dest": "empty",
                "sec-fetch-mode": "cors",
                "sec-fetch-site": "cross-site",
                "sign": "26EE42C14AF74AA8A08422E0AE9640E536C459B23E2F0F3609B6631B30C3B377",
                "timestamp": "1676427847326",
                "timezone": "7",
                "traceid": "9fd789e4-fd23-4756-81b2-535b1386d62d",
                "visitorid": "X3NBC0V7Ml9dmYkhC3NN"
            },
            "referrerPolicy": "no-referrer",
            "body": `{\"fundType\":1,\"largeSpreadRate\":0,\"leverTimes\":20,\"margin\":\"50\",\"marginCoinName\":\"USDT\",\"marketFactor\":1,\"orderType\":\"${checkUserPosition.order_type}\",\"price\":${checkUserPosition.price},\"profitLossRateDto\":{\"stopProfitRate\":\"${stopProfitRate}\",\"stopLossRate\":\"${stopLossRate}\"},\"quotationCoinId\":22,\"spreadRate\":0.001,\"stopLossPrice\":-1,\"stopProfitPrice\":-1,\"upRatio\":0.5}`,
            "method": "POST",
            "mode": "cors",
            "credentials": "include"
        });

        console.clear();
        // clearInterval(theInterval)
    }
}, 500);