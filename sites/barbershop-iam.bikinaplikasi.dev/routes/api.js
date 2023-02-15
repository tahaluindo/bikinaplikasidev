const configApp = require(process.cwd() + '/config/app')
var express = require('express');
var app = express();
var UserController = require(configApp.controllersPath("UserController"));

app.get("/api/user/login", (req, res) => UserController.login(req, res));
app.post("/api/user/login", (req, res) => UserController.postLogin(req, res));
app.get("/api/user/dashboard", (req, res) => UserController.dashboard(req, res));

module.exports = app;