var User = require('../models/users');
var express = require('express');
var router = express.Router();

/* GET users listing. */
router.get('/', function (req, res) {
    User.find(function (err, users) {
        if (err) {
            return res.send(err);
        }

        res.json(users);
    });
});

/* POST users listing. */
router.post('/', function (req, res) {
    var user = new User(req.body);

    user.save(function (err) {
        if (err) {
            return res.send(err);
        }

        res.send({ message: 'User Added' });
    });
});

module.exports = router;
