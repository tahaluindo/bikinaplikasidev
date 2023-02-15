const bcrypt = require("bcrypt");
const env = require(process.cwd() + '/env');
const fs = require("fs");
const configApp = require(process.cwd() + '/config/app')
const Controller = require(configApp.controllersPath("Controller"))

module.exports = {
    index: (req, res) => {
        Controller.view(req, res, 'index')
    },
}