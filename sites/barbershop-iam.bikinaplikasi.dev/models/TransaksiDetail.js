const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))

table = "transaksi_detail";
module.exports = {
    table: table,
    orm: Model.sequelize.define(table)
};