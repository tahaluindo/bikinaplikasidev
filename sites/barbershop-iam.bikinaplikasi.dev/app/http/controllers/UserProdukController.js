const configApp = require(process.cwd() + '/config/app')
const helpersRamdan = require(configApp.helpersPath("Ramdan"))
const env = require(process.cwd() + '/env')
const formidable = require('formidable').formidable();
const fs = require('fs');
const Controller = require(configApp.controllersPath("Controller"))
const BarberProduk = require(configApp.modelsPath("BarberProduk"))
const Kategori = require(configApp.modelsPath("Kategori"))
const Barber = require(configApp.modelsPath("Barber"))
const User = require(configApp.modelsPath("User"))
const jwt = require("jsonwebtoken");

module.exports = {
    index: async (req, res) => {
        let produk = await BarberProduk.orm.findAll({include: [Barber.orm, Kategori.orm]})

        Controller.view(req, res, 'user/produk/index', {produk: produk})
    },
    create: async (req, res) => {
        let kategori = await Kategori.orm.findAll()

        Controller.view(req, res, 'user/produk/create', {kategori: kategori})
    },
    store: (req, res) => {
        formidable.parse(req, async (err, field, files) => {
            if (err) {
                throw err
            }

            try {
                let barber = await Barber.orm.findOne({
                    where: {
                        user_id: jwt.verify(req.cookies.token, env.SECRET_KEY).id
                    }
                });

                const filePath = 'img/' + new Date().getTime() + ".png";

                fs.copyFile(files.gambar.filepath, configApp.storagePath(filePath), () => null);

                await BarberProduk.orm.create({
                    barber_id: barber.dataValues.id,
                    kategori_id: field.kategori_id,
                    nama: field.nama,
                    stok: field.stok,
                    keterangan: field.keterangan,
                    rating: field.rating,
                    harga: field.harga,
                    gambar: 'storage/' + filePath,
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
    edit: async (req, res) => {
        let kategori = await Kategori.orm.findAll()
        let produk = await BarberProduk.orm.findOne({
            where: {
                id: req.params.produk
            }
        })

        Controller.view(req, res, 'user/produk/edit', {kategori: kategori, produk: produk})
    },
    update: async (req, res) => {

        formidable.parse(req, async (err, field, files) => {
            if (err) {
                throw err
            }

            try {
                let produk = await BarberProduk.orm.findOne({
                    where: {
                        id: req.params.produk
                    }
                })

                if (files.gambar) {
                    fs.unlinkSync(configApp.publicPath(produk.gambar), () => null);

                    const filePath = 'img/' + new Date().getTime() + ".png";
                    fs.copyFile(files.gambar.filepath, configApp.storagePath(filePath), () => null);

                    await BarberProduk.orm.update({
                        kategori_id: field.kategori_id,
                        nama: field.nama,
                        stok: field.stok,
                        keterangan: field.keterangan,
                        rating: field.rating,
                        harga: field.harga,
                        gambar: 'storage/' + filePath,
                    }, {
                        where: {id: req.params.produk}
                    })
                } else {
                    await BarberProduk.orm.update({
                        kategori_id: field.kategori_id,
                        nama: field.nama,
                        stok: field.stok,
                        keterangan: field.keterangan,
                        rating: field.rating,
                        harga: field.harga,
                    }, {
                        where: {id: req.params.produk}
                    })
                }

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

        (await BarberProduk.orm.destroy({
            where: {id: req.params.produk}
        }))

        Controller.alert(req, res, 'Berhasil menghapus data!')

        res.end()
    },
}