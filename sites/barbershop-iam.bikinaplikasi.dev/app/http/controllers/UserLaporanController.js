const configApp = require(process.cwd() + '/config/app')
const env = require(process.cwd() + '/env')
const Controller = require(configApp.controllersPath("Controller"))

module.exports = {
    index: (req, res) => {
        Controller.view(req, res, 'user/laporan/index')
    },
}