var mongoose = require('mongoose');
var Schema = mongoose.Schema;

// Sub-document schemas
var docObj = require('./documents');
var Document = docObj.documentsSchema;

var usersSchema = new Schema ({
    clientName: String,
    clientDocuments: [Document]
});

module.exports = mongoose.model('User', usersSchema);