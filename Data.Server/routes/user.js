var User = require('../models/users');
var express = require('express');
var router = express.Router();

var docObj = require('../models/documents');
var docModel = docObj.model;

/* GET users:id listing. */
router.get('/:id', function (req,res) {
    User.findOne( { _id: req.params.id}, function (err, user) {
        if (err) {
            return res.send(err);
        }

        res.json(user);
    });
});

/* PUT users:id listing. */
router.put('/:id', function (req, res) {
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

/* DELETE users:id listing */
router.delete('/:id', function (req, res) {
    User.deleteOne( { _id: req.params.id}, function (err, user) {
        if (err) {
            return res.send(err);
        }

        res.json({ message: 'Successfully deleted' });
    });
});

/* POST to add document to user:id listing */
router.post('/:id', function (req, res) {
    User.findOne( { _id: req.params.id }, function (err, user) {
        user.clientDocuments.push(new docModel(req.body));

        user.save(function (err) {
            if (err) {
                return res.send(err);
            }

            res.send({ message: 'Document Added' });
        });
    });
});

module.exports = router;