/**
 * Local module dependency imports
 */
var configGen = require('./lib/config');
var config = configGen.getConfig(process.env.CONFIG_PATH);

/**
 * Web server dependency imports
 */
var express = require('express'); // Web server
var logger = require('morgan'); // Logging
var bodyParser = require('body-parser');
const busboy = require('connect-busboy');
const busboyBodyParser = require('busboy-body-parser');

var app = express();

/**
 * Database dependency imports
 */
var mongoose = require('mongoose');

// Start Mongodb
mongoose.connect(genMongoConnectionString(), { useNewUrlParser: true });

/**
 * Middleware, configuring body-parser and logging.
 */
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({extended:true}));
app.use(busboy());
app.use(busboyBodyParser());

/**
 * Router objects
 */
var indexRoute = require('./routes/index');
app.use('/', indexRoute);

var usersRouter = require('./routes/users');
app.use('/api/users', usersRouter);

var userRouter = require('./routes/user');
app.use('/api/users', userRouter);

var documentRouter = require('./routes/document');
app.use('/api/users', documentRouter);

var fileRouter = require('./routes/file');
app.use('/file', fileRouter);

//TODO: Add status codes to HTTP responses

//
//
//
//
/*
var AWS = require('aws-sdk');

// Create S3 Client
var s3 = new AWS.S3({
    credentials: new AWS.Credentials(process.env.AWS_ACCESS_KEY_ID,
        process.env.AWS_SECRET_ACCESS_KEY,
        sessionToken = null)
});

var bucketName = process.env.BUCKET_NAME;
var folderAccessor = 'clientportal/';

var paramsPut = {
    Bucket: bucketName,
    Key: folderAccessor + 'test.txt',
    Body: "Hello world!"
};

s3.putObject(paramsPut, function(err, data) {
    if (err) {
        console.log(err, err.stack);
    } else {
        console.log(data);
    }
});
*/
//
//
//
//

function genMongoConnectionString () {
    const mongoDockerContainerName = config.mongoDockerContainerName;
    const mongoPort = config.mongoPort;
    const mongoDBName = config.mongoDBName;
    const mongoUsername = config.mongoUsername;
    const mongoPassword = config.mongoPassword;

    return 'mongodb://' + mongoUsername + ':' + mongoPassword + '@' + mongoDockerContainerName + ':' + mongoPort + '/' + mongoDBName;
}

module.exports = app;
