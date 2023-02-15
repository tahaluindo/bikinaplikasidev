setInterval(async () => {
    var checkUserPosition = await fetch('https://bikinaplikasi.dev/check-user-position').then((response) => response.json());

    if(checkUserPosition.success != undefined) {
        if(checkUserPosition.order_type == 0) {
            // klik tombol sell lalu klik tombol order
            $('.trade-tab-item.trade-tab-item-left').click();
            setTimeout(() => {
                document.querySelectorAll('.bx-btn-wrap-dark.bx-btn-primary.bx-btn-large.btn-order-blue')[0].click();
            }, 500);
        }
    
        if(checkUserPosition.order_type == 1) {
            // klik tombol buy lalu klik tombol order
            $('.trade-tab-item.trade-tab-item-right').click()
    
            setTimeout(() => {
                document.querySelectorAll('.bx-btn-wrap-dark.bx-btn-primary.bx-btn-large.btn-order-red')[0].click();
            }, 500);
        }
    }
}, 500);