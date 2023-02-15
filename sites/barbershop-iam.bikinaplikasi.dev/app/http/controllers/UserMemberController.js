const configApp = require(process.cwd() + '/config/app')
const helpersRamdan = require(configApp.helpersPath("Ramdan"))
const env = require(process.cwd() + '/env')
const formidable = require('formidable').formidable();
const fs = require('fs');
const Controller = require(configApp.controllersPath("Controller"))
const Member = require(configApp.modelsPath("Member"))
const Barber = require(configApp.modelsPath("Barber"))
const User = require(configApp.modelsPath("User"))

module.exports = {
    index: async (req, res) => {
        let member = await Member.orm.findAll({
            include: [{
                model: User.orm,
                all: true,
                nested: true
            }, {
                model: Barber.orm,
                all: true,
                nested: true
            }]
        })

        Controller.view(req, res, 'user/member/index', {member: member})
    },
    create: (req, res) => {

    },
    store: (req, res) => {

    },
    edit: async (req, res) => {

        let member = await Member.orm.findOne({
            where: {
                id: req.params.member
            },
            include: User.orm
        })

        Controller.view(req, res, 'user/member/edit', {member: member})
    },
    update: (req, res) => {

        formidable.parse(req, async (err, field, files) => {
            if (err) {
                throw err
            }

            let member = await Member.orm.findOne({
                where: {
                    id: req.params.member
                },
                include: User.orm
            })

            if (member.dataValues.user.dataValues.foto && field.foto) {
                if (fs.existsSync(configApp.publicPath(member.dataValues.user.dataValues.foto))) {

                    fs.unlinkSync(configApp.publicPath(member.dataValues.user.dataValues.foto));

                    (await User.orm.update({
                        nama: field.nama,
                        foto: helpersRamdan.base64ToPng(field.foto, "img/" + new Date().getTime() + ".png"),
                    }, {
                        where: {id: member.dataValues.user.dataValues.id}
                    }))
                }
            } else {
                (await User.orm.update({
                    nama: field.nama,
                }, {
                    where: {id: member.dataValues.user.dataValues.id}
                }))
            }

            try {
                (await Member.orm.update({
                    type: field.type,
                    tempat_lahir: field.tempat_lahir,
                    tanggal_lahir: field.tanggal_lahir,
                    jenis_kelamin: field.jenis_kelamin,
                }, {
                    where: {id: req.params.member}
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
        (await Member.orm.destroy({
            where: {id: req.params.member}
        }))

        Controller.alert(req, res, 'Data berhasil dihapus!')
    },
}