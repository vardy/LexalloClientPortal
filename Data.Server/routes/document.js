var User = require('../models/users');
var express = require('express');
var router = express.Router();

/* GET users:userId:docId listing. */
router.get('/:userId/:docId', function (req,res) {
    User.findOne( { _id: req.params.userId }, function (err, user) {
        if (err) {
            return res.send(err);
        }

        var doc = user.clientDocuments.id(req.params.docId);
        if (doc == null) {
            return res.send('Document not found');
        } else {
            res.json(doc);
        }
    });
});

/* DELETE users:userId:docId listing */
router.delete('/:userId/:docId', function (req,res) {
    User.findOne( {_id: req.params.userId}, function (err, user) {
        if (err) {
            return res.send(err);
        }

        var doc = user.clientDocuments.id(req.params.docId);

        if (doc == null) {
            return res.send('Document not found');
        } else {
            doc.remove();
            user.save(function (err) {
                if (err) {
                    return res.send(err);
                }

                return res.send('Document deleted successfully');
            });
        }
    });
});

module.exports = router;