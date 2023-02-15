const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))
const BarberProduk = require(configApp.modelsPath("BarberProduk"))
const DataTypes = require("sequelize");

table = "kategori";
orm = Model.sequelize.define(table, {
    id: {type: DataTypes.NUMBER, primaryKey: true},
    type: Number,
    nama: String,
    jenis: String,
}, {
    timestamps: false,
    freezeTableName: true,
});

orm.hasMany(BarberProduk.orm, {
    foreignKey: 'kategori_id'
})

BarberProduk.belongsTo(Kategori.orm, {
    foreignKey: {
        name: 'kategori_id'
    }
})

module.exports = {
    table: table,
    orm: orm
};