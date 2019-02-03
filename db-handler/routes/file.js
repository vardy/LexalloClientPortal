var express = require('express');
var Busboy = require('busboy');
var fs = require('fs');
var router = express.Router();

/**
 * AWS-SDK S3 client configuration and instantiation
 */

var AWS = require('aws-sdk');

// Create S3 Client
var s3 = new AWS.S3({
    credentials: new AWS.Credentials(process.env.AWS_ACCESS_KEY_ID,
                                     process.env.AWS_SECRET_ACCESS_KEY,
                                     sessionToken = null)
});

var bucketName = process.env.BUCKET_NAME;
var folderAccessor = 'clientportal/';

router.get('/list', function (req, res) {
    var params = {
        Bucket: bucketName,
        MaxKeys: 4
    };

    s3.listObjects(params, function(err, data) {
        if (err) {
            res.send(err);
        } else {
            res.send(data);
        }
    });
});

router.get('/clientportal/:key', function (req, res) {
    var fileKey = folderAccessor + req.params.key;

    var params = {
        Bucket: bucketName,
        Key: fileKey
    };

    s3.getObject(params, function (err, data) {
        if (err) {
            res.send(err);
        } else {
            res.attachment(fileKey);
            var fileStream = s3.getObject(params).createReadStream();
            fileStream.pipe(res);
        }
    });
});

router.delete('/clientportal/:key', function (req, res) {
    var fileKey = folderAccessor + req.params.key;

    var params = {
        Bucket: bucketName,
        Key: fileKey
    };

    s3.deleteObject(params, function(err, data) {
        if (err){
            res.send(err);
        } else{
            res.send('File successfully deleted');
        }
    });
});

router.post('/clientportal/upload', function (req, res, next) {
    // This grabs the additional parameters so in this case passing
    // in "element1" with a value.
    const element1 = req.body.element1;
    const element2 = req.body.element2;
    var busboy = new Busboy({ headers: req.headers });

    var fieldname = null;
    var file = null;
    var filename = null;

    // The file upload has completed
    busboy.on('file', function(fieldname_, file_, filename_, encoding, mimetype) {
        fieldname = fieldname_;
        file = file_;
        filename = filename_;
    });

    console.log('element1: \n' + element1);
    console.log('element2: \n' + element2);

    console.log('fieldname: \m' + fieldname);
    console.log('filename: \m' + filename);
    console.log('file: \m' + file);

    req.pipe(busboy);
});

/*
router.post('/clientportal/upload', function (req, res) {
    // Upload file
    // Name of file in 'name'
    // Uses form-data file in 'file'
    // "name" => fileName, "file" => fileData

    var name = req.body.name;
    var busboy = new Busboy({ headers: req.headers });

    busboy.on('finish', function() {
        // Your files are stored in req.files. In this case,
        // you only have one and it's req.files.element2:
        // This returns:
        // {
        //    element2: {
        //      data: ...contents of the file...,
        //      name: 'Example.jpg',
        //      encoding: '7bit',
        //      mimetype: 'image/png',
        //      truncated: false,
        //      size: 959480
        //    }
        // }
        // Grabs your file object from the request.
        console.log(req.files);
        var file = req.files.file;
        console.log(file);
    });
    req.pipe(busboy);


    var paramsPut = {
        Bucket: bucketName,
        Key: folderAccessor + 'test.txt',
        Body: "Hello world!"
    };

    s3.putObject(paramsPut, function(err, data) {
        if (err) {
            console.log(err, err.stack);
        } else {
            console.log('putObject ::' + JSON.stringify(data));

            var paramsGet = {
                Bucket: bucketName,
                Key: folderAccessor + 'test.txt'
            };

            s3.getObject(paramsGet, function (err, data) {
                if (err) {
                    console.log(err, err.stack);
                } else {
                    console.log('getObject ::' + JSON.stringify(data));
                }
            });
        }
    });

});*/

module.exports = router;