const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))

table = "rekening";
module.exports = {
    table: table,
    orm: Model.sequelize.define(table)
};