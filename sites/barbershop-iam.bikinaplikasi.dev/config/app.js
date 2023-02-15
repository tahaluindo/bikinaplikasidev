const orm = require("orm");
const env = require(process.cwd() + '/env');
const {Sequelize} = require("sequelize");
//X
module.exports = {
    viewsPath: function (item, cwd = true) {
        if (cwd) {
            cwd = process.cwd() + "/"
        } else {

            cwd = ""
        }

        if (item) {
            return cwd + "resources/views/" + item + ".html";
        }

        return cwd + "resources/views";

    },
    controllersPath: function (item, cwd = true) {
        if (cwd) {
            cwd = process.cwd() + "/"
        } else {

            cwd = ""
        }

        if (item) {
            return cwd + "app/http/controllers/" + item;
        }
        return cwd + "app/http/controllers";

    },
    publicPath: function (item, cwd = true) {
        if (cwd) {
            cwd = process.cwd() + "/"
        } else {

            cwd = ""
        }

        if (item) {
            return cwd + "public/" + item;
        }
        return cwd + "public";

    },
    routesPath: function (item, cwd = true) {
        if (cwd) {
            cwd = process.cwd() + "/"
        } else {

            cwd = ""
        }

        if (item) {

            return cwd + "routes/" + item;
        }

        return cwd + "routes";
    },
    modelsPath: function (item, cwd = true) {
        if (cwd) {
            cwd = process.cwd() + "/"
        } else {

            cwd = ""
        }

        if (item) {

            return cwd + "models/" + item;
        }

        return cwd + "models";
    },
    middlewaresPath: function (item, cwd = true) {
        if (cwd) {
            cwd = process.cwd() + "/"
        } else {

            cwd = ""
        }

        if (item) {

            return cwd + "app/http/middlewares/" + item;
        }

        return cwd + "app/http/middlewares";
    },
    helpersPath: function (item, cwd = true) {
        if (cwd) {
            cwd = process.cwd() + "/"
        } else {

            cwd = ""
        }

        if (item) {

            return cwd + "helpers/" + item;
        }

        return cwd + "helpers";
    },
    storagePath: function (item, cwd = true, withPublic = true) {
        if (cwd) {
            cwd = process.cwd() + "/"
        } else {

            cwd = ""
        }

        if (item) {

            if (withPublic) {

                return cwd + "public/storage/" + item;
            } else {

                return cwd + "storage/" + item;
            }
        }
    },
    database: (req, res, next) => {

        next();
    }
}