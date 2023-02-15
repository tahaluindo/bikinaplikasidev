const configApp = require(process.cwd() + '/config/app')
const Model = require(configApp.modelsPath("Model"))
const User = require(configApp.modelsPath("User"))
const DataTypes = require("sequelize");

table = "barber";
orm = Model.sequelize.define(table, {
    id: {type: DataTypes.NUMBER, primaryKey: true},
    user_id: Number,
    pemilik: String,
    link: Number, // FLOAT
}, {
    timestamps: false,
    freezeTableName: true,
});

orm.belongsTo(User.orm, {
    foreignKey: {
        name: 'user_id'
    }
})

module.exports = {
    table: table,
    orm: orm
};