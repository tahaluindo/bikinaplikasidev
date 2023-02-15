const configApp = require(process.cwd() + '/config/app')
const helpersRamdan = require(configApp.helpersPath("Ramdan"))
const Controller = require(configApp.controllersPath("Controller"))
const env = require(process.cwd() + '/env')
const jwt = require("jsonwebtoken");
const bcrypt = require("bcrypt");
const fs = require("fs");
const formidable = require('formidable').formidable();
const User = require(configApp.modelsPath("User"))

module.exports = {
    dashboard: (req, res) => {
        Controller.view(req, res, 'user/dashboard')
    },
    index: (req, res) => {
        Controller.view(req, res, 'user/index')
    },
    create: (req, res) => {
        Controller.view(req, res, 'user/create')
    },
    store: (req, res) => {
        res.end();
    },
    edit: (req, res) => {
        Controller.view(req, res, 'user/edit')
    },
    update: (req, res) => {

    },
    destroy: (req, res) => {
        res.end();
    },
    profile: (req, res) => {
        Controller.view(req, res, 'user/profile')
    },

    profileUpdate: (req, res) => {
        formidable.parse(req, async (err, field, files) => {
            if (err) {
                throw err
            }

            let user = jwt.verify(req.cookies.token, env.SECRET_KEY);

            if (user.foto) {
                if (fs.existsSync(configApp.publicPath(user.foto))) {

                    fs.unlinkSync(configApp.publicPath(user.foto));
                }

                bcrypt.genSalt(env.SALT_ROUNDS, (err, salt) => {
                    bcrypt.hash(field.password, salt, async (err, hash) => {
                        console.log(field)
                        try {
                            (await User.orm.update({
                                ...field,
                                foto: helpersRamdan.base64ToPng(field.foto, "img/" + new Date().getTime() + ".png"),
                                password: hash
                            }, {
                                where: {id: user.id}
                            }))

                            let userUpdate = (await User.orm.findOne({
                                where: {"email": user.email}
                            })).dataValues

                            res.cookie("token", jwt.sign(userUpdate, env.SECRET_KEY))

                            Controller.alert(req, res, 'Berhasil mengupdate data!')
                        } catch (err) {
                            if (err) {
                                res.json({
                                    error: true,
                                    message: "Gagal menyimpan data: " + err
                                });
                            }

                        }
                    });
                })
            }
        })
    }
}