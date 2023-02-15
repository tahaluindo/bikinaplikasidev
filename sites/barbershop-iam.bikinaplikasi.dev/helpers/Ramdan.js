const configApp = require(process.cwd() + '/config/app')
const jwt = require('jsonwebtoken');
const fs = require('fs');
const env = require(process.cwd() + '/env')

module.exports = {
    toIdr: function (angka, prefix) {
        var number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;

        return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    },
    user: (req) => {
        return jwt.verify(req.cookies.token, env.SECRET_KEY);
    },
    base64ToPng: (fileBase64, fileName) => {
        let base64Data = fileBase64.replace(/^data:image\/png|data:image\/jpg|data:image\/jpeg|;base64,/g, "");

        fs.writeFileSync(configApp.storagePath(fileName), base64Data, 'base64');

        return configApp.storagePath(fileName, false, false)
    }
}