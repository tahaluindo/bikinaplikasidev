const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))
const User = require(configApp.modelsPath("User"))
const Barber = require(configApp.modelsPath("Barber"))
const DataTypes = require("sequelize");

table = "member";

orm = Model.sequelize.define(table, {
    id: {type: DataTypes.NUMBER, primaryKey: true},
    user_id: Number,
    barber_id: Number,
    type: String,
    tempat_lahir: String,
    tanggal_lahir: String,
    jenis_kelamin: String,
}, {
    timestamps: false,
    freezeTableName: true,
});

orm.belongsTo(User.orm, {
    foreignKey: {
        name: 'user_id'
    }
})

orm.belongsTo(Barber.orm, {
    foreignKey: {
        name: 'barber_id'
    }
})

module.exports = {
    table: table,
    orm: orm
};