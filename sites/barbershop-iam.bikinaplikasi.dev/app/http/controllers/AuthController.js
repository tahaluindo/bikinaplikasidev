const configApp = require(process.cwd() + '/config/app')
const env = require(process.cwd() + '/env')
const fs = require("fs");
const bcrypt = require("bcrypt");
const jwt = require('jsonwebtoken');
const Controller = require(configApp.controllersPath("Controller"))
const User = require(configApp.modelsPath("User"))

module.exports = {
    createPassword: (req, res) => bcrypt.genSalt(env.SALT_ROUNDS, function (err, salt) {
        bcrypt.hash(req.query.password, salt, function (err, hash) {
            res.writeHead(200, {'Content-Type': 'text/html'});
            res.write(hash);
            res.end();
        });
    }),

    login: (req, res) => {
        Controller.viewOnly(req, res, 'auth/login')
    },

    postLogin: async (req, res) => {
        let user = (await User.orm.findOne({
            where: {"email": req.body.email}
        })).dataValues

        if (!user) {
            Controller.alert(req, res, 'Akun tidak ditemukan!')
        } else {

            bcrypt.compare(req.body.password, user.password, function (err, result) {
                if (result) {
                    res.cookie("token", jwt.sign(user, env.SECRET_KEY))

                    Controller.redirect(req, res, '/user/dashboard')
                } else {
                    Controller.alert(req, res, 'Email / password salah!')
                }
            });
        }
    },

    signUp: (req, res) => {

    },

    postSignUp: (req, res) => {

    },

    logout: (req, res) => {
        res.cookie("token", null)

        Controller.redirect(req, res, '/auth/login')
    },
}