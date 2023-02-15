const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))
const Barber = require(configApp.modelsPath("Barber"))
const Kategori = require(configApp.modelsPath("Kategori"))
const DataTypes = require("sequelize");

table = "barber_produk";
orm = Model.sequelize.define(table, {
    id: {type: DataTypes.NUMBER, primaryKey: true},
    barber_id: Number,
    kategori_id: Number,
    nama: String,
    harga: Number,
    stok: Number,
    keterangan: String,
    gambar: String,
    rating: Number, // FLOAT
    created_at: String, // FLOAT
    updated_at: String, // FLOAT
}, {
    timestamps: false,
    freezeTableName: true,
});

orm.belongsTo(Barber.orm, {
    foreignKey: {
        name: 'barber_id'
    }
})

orm.belongsTo(Kategori.orm, {
    foreignKey: {
        name: 'kategori_id'
    }
})

module.exports = {
    table: table,
    orm: orm
};