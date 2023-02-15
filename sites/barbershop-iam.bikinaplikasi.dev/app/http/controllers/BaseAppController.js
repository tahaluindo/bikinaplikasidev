const configApp = require(process.cwd() + '/config/app')
const fs = require('fs')
const helpersRamdan = require(configApp.helpersPath("Ramdan"))
const Controller = require(configApp.controllersPath("Controller"))

module.exports = {
    index: (req, res) => {
        Controller.viewOnly(req, res, 'index');
    },
}