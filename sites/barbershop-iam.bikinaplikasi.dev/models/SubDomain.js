const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))

table = "sub_domain";
module.exports = {
    table: table,
    orm: Model.sequelize.define(table)
};