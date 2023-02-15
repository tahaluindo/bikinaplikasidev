var express = require('express');
var app = express();
const configApp = require(process.cwd() + '/config/app');
const bodyParser = require("body-parser");
const env = require(process.cwd() + '/env');
const cookieParser = require("cookie-parser");
const {execSync} = require('child_process');
const kill = require('kill-port')
var expressLayouts = require('express-ejs-layouts');

app.use(cookieParser())
app.use(express.static(configApp.publicPath()));
app.engine('html', require('ejs').renderFile);
app.set('views', configApp.viewsPath());
app.set('view engine', 'ejs');
app.set('layout extractScripts', true)
app.set('layout extractStyles', true)
app.set('layout', configApp.viewsPath('layouts/admin'));
app.use(expressLayouts);
app.use(bodyParser.json())
app.use(bodyParser.urlencoded({extended: false}));
app.use(configApp.database);

app.use(require(configApp.routesPath("api")));
app.use(require(configApp.routesPath("web")));

app.listen(env.DEFAULT_PORT).addListener("error", (err => {
    console.log(err)
    execSync('taskkill /F /IM node.exe')
    app.listen(env.DEFAULT_PORT)
}));

console.log("Server listening on port: " + env.DEFAULT_PORT)
