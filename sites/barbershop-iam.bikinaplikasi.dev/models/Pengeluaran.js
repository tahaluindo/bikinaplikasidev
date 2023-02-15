const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))

table = "pengeluaran";
module.exports = {
    table: table,
    orm: Model.sequelize.define(table)
};