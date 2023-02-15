const jwt = require("jsonwebtoken");
const env = require(process.cwd() + '/env');

module.exports = {
    authenticate: (req, res) => {
        try {
            jwt.verify(req.cookies.token, env.SECRET_KEY);
            req.next();
        } catch (err) {
            res.writeHead(302, {
                'Location': '/auth/login'
            });

            res.end()
        }
    }
}