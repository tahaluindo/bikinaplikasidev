mines = [0, 0];
plush = [0, 0];

berapa_tahun_percobaan = 10000000;
initial_saldo = 5000;
ada_draw = true;
risk = initial_saldo / 100 * 1.5;
reward = risk * 5.33;
winrate = 16;
minimum_profit_per_bulan = 6;
jumlah_percobaan_per_bulan = 50;
jumlah_berapa_bulan_percobaan = 6 * 1;
biaya_per_trade = 0.04; // percent








function testStrategy() {

    pnl = 0;
    jumlah_profit = 0;
    jumlah_loss = 0;
    jumlah_draw = 0;


    for (b = 0; b < jumlah_berapa_bulan_percobaan; b++) {
        for (a = 0; a < jumlah_percobaan_per_bulan; a++) {
            let random = Math.random();
            result = Math.ceil(random * 10 / ((100 - winrate) / 10)) - 1;

            if (result >= 1) {
                pnl += reward;
                jumlah_profit++;
            } else {
                result_draw = Math.ceil(Math.random() * 10 / 7) - 1;

                if (ada_draw && result_draw) {
                    jumlah_draw++;
                } else {
                    pnl -= risk;
                    jumlah_loss++;
                }

            }
        }
    }

    saldo_akhir = (initial_saldo + pnl) * ((100 - (biaya_per_trade * 100)) / 100)
    total_trade = jumlah_profit + jumlah_draw + jumlah_loss;
    profit_rata_rata = ((saldo_akhir - initial_saldo) / jumlah_berapa_bulan_percobaan);
    saldo_akhir_per_bulan = initial_saldo + profit_rata_rata;
    persentase_rata_rata = profit_rata_rata / (initial_saldo / 100);
    persentase_rata_rata_total = ((saldo_akhir / (initial_saldo / 100)) - 100);

    if (persentase_rata_rata_total < 0 && mines.length <= 10000000 && (jumlah_profit / jumlah_berapa_bulan_percobaan) >= minimum_profit_per_bulan) {
        mines.push(persentase_rata_rata_total);
    } else if (persentase_rata_rata_total > 0 && (jumlah_profit / jumlah_berapa_bulan_percobaan) >= minimum_profit_per_bulan) {
        plush.push(persentase_rata_rata_total);
    }

    // console.log("saldo akhir: " + saldo_akhir)
    // console.log("total trade: " + total_trade)
    // console.log("jumlah profit: " + jumlah_profit)
    // console.log("jumlah draw: " + jumlah_draw)
    // console.log("jumlah loss: " + jumlah_loss)
    // console.log("profit rata rata per bulan: " + profit_rata_rata)
    // console.log("rata rata saldo akhir per bulan: " + saldo_akhir_per_bulan)
    // console.log("persentase rata rata per bulan: " + persentase_rata_rata + "%")
    // console.log("persentase rata rata total:" + persentase_rata_rata_total + "%")
    //-0.328,2.24,-7,-8,-10,-8,-43,-16,0.3,-20,-2,-1.2,-15,-32,-10,-7,56,-6
}

for (let i = 0; i < 2 * berapa_tahun_percobaan; i++) {
    testStrategy();
}

hasil = mines.reduce((a, b) => a + b) + plush.reduce((a, b) => a + b);
hasil_per_tahun = hasil / berapa_tahun_percobaan;
console.log("Penghasilanmu setiap tahun adalah: " + Math.floor(hasil_per_tahun) + "%")