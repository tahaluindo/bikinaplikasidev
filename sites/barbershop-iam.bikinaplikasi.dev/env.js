
module.exports = {
    APP_NAME: "HAIRBOOK",
    SECRET_KEY: "BIKINAPLIKASI.DEV",
    SALT_ROUNDS: 10,
    DEFAULT_PORT: 2000,

    DB_HOST: process.argv[2] ? (process.argv[2] === "docker" ? "mariadb" : (process.argv[2] === "live" ? "185.211.5.241":"localhost")) : "localhost",
    DB_NAME: "barbershop_iam",
    DB_USER: "root4",
    DB_PASSWORD: "root4",
}

