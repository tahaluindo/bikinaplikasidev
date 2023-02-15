const configApp = require(process.cwd() + '/config/app')
const helpersRamdan = require(configApp.helpersPath("Ramdan"))
const env = require(process.cwd() + '/env')
const formidable = require('formidable').formidable();
const fs = require('fs');
const Controller = require(configApp.controllersPath("Controller"))

module.exports = {
    index: async (req, res) => {
        let barberKaryawan = await require(configApp.modelsPath("BarberKaryawan")).getData(req, res);

        Controller.view(req, res, 'user/barber/karyawan/index', {barberKaryawan: barberKaryawan})
    },
    create: (req, res) => {

        Controller.view(req, res, 'user/barber/karyawan/create')
    },
    store: (req, res) => {
        formidable.parse(req, (err, field, files) => {
            if (err) {
                throw err
            }

            // req.models.user.create([
            //     field
            // ])

            res.json(field);
            res.end();
        });
    },
    edit: async (req, res) => {

        let barberKaryawan = await require(configApp.modelsPath("BarberKaryawan")).find(req, req.params.barberKaryawan)
        Controller.view(req, res, 'user/barber/karyawan/edit', {barberKaryawan: barberKaryawan})
    },
    update: (req, res) => {


    },
    destroy: (req, res) => {


    },
}