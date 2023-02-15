const configApp = require(process.cwd() + '/config/app')
const env = require(process.cwd() + '/env')
const fs = require("fs");
const bcrypt = require("bcrypt");
const Controller = require(configApp.controllersPath("Controller"))

module.exports = {
    index: (req, res) => {
        Controller.viewNoAuth(req, res, 'barber/index')
    },

    show: (req, res) => {
        res.writeHead(200, {'Content-Type': 'text/html'});

        req.models.user.find({"username": req.params.barber, "level": "Barber"}, (err, barber) => {
            if (barber === undefined) {
                Controller.alert(req, res, 'Barber tidak ditemukan!')
            } else {

                Controller.viewNoAuth(req, res, 'barber/index', {barber: barber[0]})
            }
        });
    },
}