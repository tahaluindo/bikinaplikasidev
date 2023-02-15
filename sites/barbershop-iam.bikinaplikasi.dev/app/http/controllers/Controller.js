const configApp = require(process.cwd() + '/config/app')
const env = require(process.cwd() + '/env')
const jwt = require("jsonwebtoken");
const fs = require("fs");
var express = require('express');
var app = express();
let ejs = require('ejs');

module.exports = {
    view: (req, res, view, data) => {
        res.render(configApp.viewsPath(view), {
            uriPage: view.replaceAll(/\/index|\/create|\/edit|\/[0-9]/g, ''),
            view: configApp.viewsPath(view),
            env: env,
            authUser: jwt.verify(req.cookies.token, env.SECRET_KEY),
            ...data
        })
        res.end();
    },
    viewOnly: (req, res, view) => {
        res.write(fs.readFileSync(configApp.viewsPath(view)))
        res.end();
    },
    viewNoAuth: (req, res, view, data) => {
        ejs.renderFile(configApp.viewsPath(view), {
            uriPage: view.replaceAll(/\/index|\/create|\/edit|\/[0-9]/g, ''),
            view: configApp.viewsPath(view),
            env: env,
            ...data
        }, {}, (err, str) => {

            res.write(str)
            res.end();
        })
    },
    alert: (req, res, msg, location = "window.history.back();") => {
        res.write(`<script>alert('${msg}'); ${location}</script>`);
        res.end();
    },
    redirect: (req, res, location) => {
        res.writeHead(302, {
            location: location
        });
        res.end();
    }
}