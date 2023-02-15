let ws = new WebSocket('wss://open-api-ws.bingx.com/market?symbol=BTC=USDT');

ws.onopen = function () {
    //Subscribe to the channel
    console.log("Websocket openned");

    var dataToSubscribe = {
        "id": "237849237492739252365",
        "dataType": "SAND-USDT@trade"
    }

    ws.send(JSON.stringify(dataToSubscribe))
}

ws.onmessage = function (msg) {

    var inflate = new Zlib.Inflate(msg.data);
    var output = inflate.decompress();

    console.log(output)
}