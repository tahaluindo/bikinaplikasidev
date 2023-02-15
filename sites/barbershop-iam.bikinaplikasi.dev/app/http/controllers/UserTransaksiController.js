const configApp = require(process.cwd() + '/config/app')
const env = require(process.cwd() + '/env')

module.exports = {
    index: (req, res) => {
        Controller.view(req, res, 'user/transaksi/index')
    },
    create: (req, res) => {
        Controller.view(req, res, 'user/transaksi/index')
    },
    store: (req, res) => {
        Controller.view(req, res, 'user/transaksi/index')
    },
    edit: (req, res) => {
        Controller.view(req, res, 'user/transaksi/index')
    },
    update: (req, res) => {
        Controller.view(req, res, 'user/transaksi/index')
    },
    destroy: (req, res) => {
        Controller.view(req, res, 'user/transaksi/index')
    },
}