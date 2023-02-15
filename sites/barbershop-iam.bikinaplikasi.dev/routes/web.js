const configApp = require(process.cwd() + '/config/app')
var express = require('express');
var app = express();
var userRouter = express.Router();
var authRouter = express.Router();
var userAdminRouter = express.Router();
var userKategoriRouter = express.Router();
var userLaporanRouter = express.Router();
var userBarberRouter = express.Router();
var userMemberRouter = express.Router();
var userBilingRouter = express.Router();
var userTransaksiRouter = express.Router();
var barberRouter = express.Router();
var userBarberKaryawanRouter = express.Router();
var userProdukRouter = express.Router();
var baseAppRouter = express.Router();
var BaseAppController = require(configApp.controllersPath("BaseAppController"));
var UserController = require(configApp.controllersPath("UserController"));
const BarberController = require(configApp.controllersPath("BarberController"));
const AuthController = require(configApp.controllersPath("AuthController"));
const UserBarberKaryawanController = require(configApp.controllersPath("UserBarberKaryawanController"));
const UserAdminController = require(configApp.controllersPath("UserAdminController"));
const UserTransaksiController = require(configApp.controllersPath("UserTransaksiController"));
const UserLaporanController = require(configApp.controllersPath("UserLaporanController"));
const UserBarberController = require(configApp.controllersPath("UserBarberController"));
const UserMemberController = require(configApp.controllersPath("UserMemberController"));
const UserBilingController = require(configApp.controllersPath("UserBilingController"));
const UserKategoriController = require(configApp.controllersPath("UserKategoriController"));
const UserProdukController = require(configApp.controllersPath("UserProdukController"));
const AuthMiddleware = require(configApp.middlewaresPath("AuthMiddleware"));

// base app barber router
baseAppRouter.get("/", (req, res) => BaseAppController.index(req, res));
app.use("/", baseAppRouter)

// auth router
authRouter.get("/login", (req, res) => AuthController.login(req, res));
authRouter.post("/login", (req, res) => AuthController.postLogin(req, res));
authRouter.get("/sign-up", (req, res) => AuthController.signUp(req, res));
authRouter.post("/sign-up", (req, res) => AuthController.postSignUp(req, res));
authRouter.get("/logout", (req, res) => AuthController.logout(req, res));
userRouter.get("/create-password", (req, res) => AuthController.createPassword(req, res));
app.use("/auth", authRouter)

// halaman pengunjung untuk melihat sebuah barber
barberRouter.get("", (req, res) => BarberController.index(req, res));
barberRouter.get("/:barber", (req, res) => BarberController.show(req, res));
barberRouter.get("/:barber/about", (req, res) => BarberController.about(req, res));
barberRouter.get("/:barber/contact", (req, res) => BarberController.contact(req, res));
barberRouter.get("/:barber/produk/:produk", (req, res) => BarberController.produkShow(req, res));
barberRouter.get("/:barber/keranjang", (req, res) => BarberController.keranjang(req, res));
barberRouter.get("/:barber/payment", (req, res) => BarberController.payment(req, res));
barberRouter.get("/:barber/portfolio", (req, res) => BarberController.portfolio(req, res));
barberRouter.get("/:barber/riwayat", (req, res) => BarberController.riwayat(req, res));
barberRouter.get("/:barber/services", (req, res) => BarberController.services(req, res));
barberRouter.get("/:barber/sign", (req, res) => BarberController.sign(req, res));
app.use("/barber", barberRouter)

// halaman user untuk mengelola data
userRouter.use((req, res) => AuthMiddleware.authenticate(req, res));
userRouter.get("/dashboard", (req, res) => UserController.dashboard(req, res));
userRouter.get("/:user/edit", (req, res) => UserController.edit(req, res));
userRouter.get("/create", (req, res) => UserController.create(req, res));
userRouter.post("/store", (req, res) => UserController.store(req, res));
userRouter.post("/:user/update", (req, res) => UserController.update(req, res));
userRouter.get("/:user/destroy", (req, res) => UserController.destroy(req, res));
userRouter.get("/profile", (req, res) => UserController.profile(req, res));
userRouter.post("/profile", (req, res) => UserController.profileUpdate(req, res));
app.use("/user", userRouter)

userAdminRouter.get("", (req, res) => UserAdminController.index(req, res));
app.use("/user/admin", userAdminRouter)

userTransaksiRouter.get("", (req, res) => UserTransaksiController.index(req, res));
app.use("/user/transaksi", userTransaksiRouter)

userLaporanRouter.get("", (req, res) => UserLaporanController.index(req, res));
app.use("/user/laporan", userLaporanRouter)


userBarberRouter.use((req, res) => AuthMiddleware.authenticate(req, res));
userBarberRouter.get("", (req, res) => UserBarberController.index(req, res));
userBarberRouter.get("/dashboard", (req, res) => UserBarberController.dashboard(req, res));
userBarberRouter.get("/:barber/edit", (req, res) => UserBarberController.edit(req, res));
userBarberRouter.get("/create", (req, res) => UserBarberController.create(req, res));
userBarberRouter.post("/store", (req, res) => UserBarberController.store(req, res));
userBarberRouter.post("/:barber/update", (req, res) => UserBarberController.update(req, res));
userBarberRouter.get("/:barber/destroy", (req, res) => UserBarberController.destroy(req, res));
userBarberRouter.get("/profile", (req, res) => UserBarberController.profile(req, res));
app.use("/user/barber", userBarberRouter)

userMemberRouter.use((req, res) => AuthMiddleware.authenticate(req, res));
userMemberRouter.get("", (req, res) => UserMemberController.index(req, res));
userMemberRouter.get("/dashboard", (req, res) => UserMemberController.dashboard(req, res));
userMemberRouter.get("/:member/edit", (req, res) => UserMemberController.edit(req, res));
userMemberRouter.get("/create", (req, res) => UserMemberController.create(req, res));
userMemberRouter.post("", (req, res) => UserMemberController.store(req, res));
userMemberRouter.post("/:member/update", (req, res) => UserMemberController.update(req, res));
userMemberRouter.get("/:member/destroy", (req, res) => UserMemberController.destroy(req, res));
userMemberRouter.get("/profile", (req, res) => UserMemberController.profile(req, res));
app.use("/user/member", userMemberRouter)

userTransaksiRouter.use((req, res) => AuthMiddleware.authenticate(req, res));
userTransaksiRouter.get("", (req, res) => UserTransaksiController.index(req, res));
userTransaksiRouter.get("/dashboard", (req, res) => UserTransaksiController.dashboard(req, res));
userTransaksiRouter.get("/:member/edit", (req, res) => UserTransaksiController.edit(req, res));
userTransaksiRouter.get("/create", (req, res) => UserTransaksiController.create(req, res));
userTransaksiRouter.post("", (req, res) => UserTransaksiController.store(req, res));
userTransaksiRouter.post("/:member/update", (req, res) => UserTransaksiController.update(req, res));
userTransaksiRouter.get("/:member/destroy", (req, res) => UserTransaksiController.destroy(req, res));
userTransaksiRouter.get("/profile", (req, res) => UserTransaksiController.profile(req, res));
app.use("/user/transaksi", userTransaksiRouter)

userKategoriRouter.use((req, res) => AuthMiddleware.authenticate(req, res));
userKategoriRouter.get("", (req, res) => UserKategoriController.index(req, res));
userKategoriRouter.get("/dashboard", (req, res) => UserKategoriController.dashboard(req, res));
userKategoriRouter.get("/:kategori/edit", (req, res) => UserKategoriController.edit(req, res));
userKategoriRouter.get("/create", (req, res) => UserKategoriController.create(req, res));
userKategoriRouter.post("", (req, res) => UserKategoriController.store(req, res));
userKategoriRouter.post("/:kategori/update", (req, res) => UserKategoriController.update(req, res));
userKategoriRouter.get("/:kategori/destroy", (req, res) => UserKategoriController.destroy(req, res));
userKategoriRouter.get("/profile", (req, res) => UserKategoriController.profile(req, res));
app.use("/user/kategori", userKategoriRouter)

userProdukRouter.use((req, res) => AuthMiddleware.authenticate(req, res));
userProdukRouter.get("", (req, res) => UserProdukController.index(req, res));
userProdukRouter.get("/dashboard", (req, res) => UserProdukController.dashboard(req, res));
userProdukRouter.get("/:produk/edit", (req, res) => UserProdukController.edit(req, res));
userProdukRouter.get("/create", (req, res) => UserProdukController.create(req, res));
userProdukRouter.post("", (req, res) => UserProdukController.store(req, res));
userProdukRouter.post("/:produk/update", (req, res) => UserProdukController.update(req, res));
userProdukRouter.get("/:produk/destroy", (req, res) => UserProdukController.destroy(req, res));
userProdukRouter.get("/profile", (req, res) => UserProdukController.profile(req, res));
app.use("/user/produk", userProdukRouter)

userBarberKaryawanRouter.use((req, res) => AuthMiddleware.authenticate(req, res));
userBarberKaryawanRouter.get("", (req, res) => UserBarberKaryawanController.index(req, res));
userBarberKaryawanRouter.get("/dashboard", (req, res) => UserBarberKaryawanController.dashboard(req, res));
userBarberKaryawanRouter.get("/:barberKaryawan/edit", (req, res) => UserBarberKaryawanController.edit(req, res));
userBarberKaryawanRouter.get("/create", (req, res) => UserBarberKaryawanController.create(req, res));
userBarberKaryawanRouter.post("", (req, res) => UserBarberKaryawanController.store(req, res));
userBarberKaryawanRouter.post("/:barberKaryawan/update", (req, res) => UserBarberKaryawanController.update(req, res));
userBarberKaryawanRouter.get("/:barberKaryawan/destroy", (req, res) => UserBarberKaryawanController.destroy(req, res));
userBarberKaryawanRouter.get("/profile", (req, res) => UserBarberKaryawanController.profile(req, res));
app.use("/user/barber/karyawan", userBarberKaryawanRouter)

userBilingRouter.get("", (req, res) => UserBilingController.index(req, res));
app.use("/user/biling", userBilingRouter)

module.exports = app;
