const configApp = require(process.cwd() + '/config/app')
const helpersRamdan = require(configApp.helpersPath("Ramdan"))
const env = require(process.cwd() + '/env')
const formidable = require('formidable').formidable();
const fs = require('fs');
const Controller = require(configApp.controllersPath("Controller"))
const Kategori = require(configApp.modelsPath("Kategori"))
const Barber = require(configApp.modelsPath("Barber"))
const User = require(configApp.modelsPath("User"))
const jwt = require("jsonwebtoken");
const BarberProduk = require(configApp.modelsPath("BarberProduk"))

module.exports = {
    index: async (req, res) => {
        let kategori = await Kategori.orm.findAll({
            include: [BarberProduk.orm]
        })

        console.log(kategori[0])

        Controller.view(req, res, 'user/kategori/index', {kategori: kategori})
    },
    create: async (req, res) => {
        Controller.view(req, res, 'user/kategori/create')
    },
    store: (req, res) => {
        formidable.parse(req, async (err, field, files) => {
            if (err) {
                throw err
            }

            try {
                await Kategori.orm.create({
                    type: field.type,
                    nama: field.nama,
                    jenis: field.jenis,
                })

                Controller.alert(req, res, 'Berhasil menyimpan data!')

                res.end()
            } catch (err) {
                if (err) {
                    res.json({
                        error: true,
                        message: "Gagal menyimpan data: " + err
                    });

                    res.end()
                }

            }
        })
    },//
    edit: async (req, res) => {
        let kategori = await Kategori.orm.findOne({
            where: {
                id: req.params.kategori
            }
        })

        Controller.view(req, res, 'user/kategori/edit', {kategori: kategori, kategori: kategori})
    },
    update: async (req, res) => {

        formidable.parse(req, async (err, field, files) => {
            if (err) {
                throw err
            }

            try {
                await Kategori.orm.update({
                    type: field.type,
                    nama: field.nama,
                    jenis: field.jenis,
                }, {
                    where: {
                        id: req.params.kategori
                    }
                })

                Controller.alert(req, res, 'Berhasil menyimpan data!')

                res.end()
            } catch (err) {
                if (err) {
                    res.json({
                        error: true,
                        message: "Gagal menyimpan data: " + err
                    });

                    res.end()
                }

            }
        })
    },
    destroy: async (req, res) => {

        (await Kategori.orm.destroy({
            where: {id: req.params.kategori}
        }))

        Controller.alert(req, res, 'Berhasil menghapus data!')

        res.end()
    },
}