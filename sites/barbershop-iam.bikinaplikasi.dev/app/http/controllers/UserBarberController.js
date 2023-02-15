const configApp = require(process.cwd() + '/config/app')
const helpersRamdan = require(configApp.helpersPath("Ramdan"))
const env = require(process.cwd() + '/env')
const formidable = require('formidable').formidable();
const fs = require('fs');
const Controller = require(configApp.controllersPath("Controller"))
const Barber = require(configApp.modelsPath("Barber"))
const User = require(configApp.modelsPath("User"))
const jwt = require("jsonwebtoken");
const bcrypt = require("bcrypt");

module.exports = {
    index: async (req, res) => {
        let barber = await Barber.orm.findAll({include: User.orm})

        Controller.view(req, res, 'user/barber/index', {barber: barber})
    },
    create: (req, res) => {

        Controller.view(req, res, 'user/barber/index')
    },
    store: (req, res) => {

    },
    edit: async (req, res) => {
        let barber = await Barber.orm.findOne({
            where: {
                id: req.params.barber
            },
            include: User.orm
        })

        Controller.view(req, res, 'user/barber/edit', {barber: barber})
    },
    update: async (req, res) => {

        formidable.parse(req, async (err, field, files) => {
            if (err) {
                throw err
            }

            let barber = await Barber.orm.findOne({
                where: {
                    id: req.params.barber
                },
                include: User.orm
            })


            if (barber.dataValues.user.dataValues.foto && field.foto) {
                if (fs.existsSync(configApp.publicPath(barber.dataValues.user.dataValues.foto))) {

                    fs.unlinkSync(configApp.publicPath(barber.dataValues.user.dataValues.foto));

                    (await User.orm.update({
                        nama: field.nama,
                        foto: helpersRamdan.base64ToPng(field.foto, "img/" + new Date().getTime() + ".png"),
                    }, {
                        where: {id: barber.dataValues.user.dataValues.id}
                    }))
                }
            } else {
                (await User.orm.update({
                    nama: field.nama,
                }, {
                    where: {id: barber.dataValues.user.dataValues.id}
                }))
            }
//
            try {
                (await Barber.orm.update({
                    pemilik: field.pemilik,
                    link: field.link
                }, {
                    where: {id: req.params.barber}
                }))

                Controller.alert(req, res, 'Berhasil mengupdate data!')
            } catch (err) {
                if (err) {
                    res.json({
                        error: true,
                        message: "Gagal menyimpan data: " + err
                    });
                }

            }
        })
    },
    destroy: async (req, res) => {

        (await Barber.orm.destroy({
            where: {id: req.params.member}
        }))

    },
}