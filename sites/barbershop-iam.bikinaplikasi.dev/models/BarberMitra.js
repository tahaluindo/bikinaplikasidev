const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))

table = "barber_mitra";
module.exports = {
    table: table,
    orm: Model.sequelize.define(table)
};