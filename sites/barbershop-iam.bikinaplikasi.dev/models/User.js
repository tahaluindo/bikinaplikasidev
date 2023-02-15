const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))
const DataTypes = require("sequelize");

table = "user";
orm = Model.sequelize.define(table, {
    id: {type: DataTypes.NUMBER, primaryKey: true},
    nama: String,
    email: String,
    username: String,
    no_hp: Number, // FLOAT
    password: String,
    level: ["Admin", "Barber", "Pelanggan"],
    foto: String,
    last_login: String,
    created_at: String,
    updated_at: String,
}, {
    freezeTableName: true,
    timestamps: false
});

module.exports = {
    table: table,
    orm: orm
};