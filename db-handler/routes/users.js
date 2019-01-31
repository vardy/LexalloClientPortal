var User = require('../models/users');
var express = require('express');
var router = express.Router();

/* GET users listing. */
router.get('/users', function (req, res) {
    User.find(function (err, users) {
        if (err) {
            return res.send(err);
        }

        res.json(users);
    });
});

/* POST users listing. */
router.post('/users', function (req, res) {
    var user = new User(req.body);

    user.save(function (err) {
        if (err) {
            return res.send(err);
        }

        res.send({ message: 'User Added' });
    });
});

/* PUT users:id listing. */
router.put('/users/:id', function (req, res) {
    User.findOne( { _id: req.params.id }, function (err, user) {
        if (err) {
            return res.send(err);
        }

        for (prop in req.body) {
            user[prop] = req.body[prop];
        }

        user.save(function (err) {
            if (err) {
                return res.send(err);
            }

            res.json({ message: 'User updated' });
        });
    });
});

/* GET users:id listing. */
router.get('/users/:id', function (req,res) {
    console.log('GET USERS:ID');
    User.findOne( { _id: req.params.id}, function(err, user) {
        if (err) {
            return res.send(err);
        }

        res.json(user);
    });
});

/* DELETE users:id listing */
router.delete('/users/:id', function (req, res) {
    console.log('DEL USERS:ID');
    User.remove( { _id: req.params.id}, function(err, user) {
        if (err) {
            return res.send(err);
        }

        res.json({ message: 'Successfully deleted' });
    });
});

module.exports = router;
