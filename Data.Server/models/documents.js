var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var documentsSchema = new Schema ({
    name: String,
    creationTime: String,
    timeToKill: String
});

var model = mongoose.model('Document', documentsSchema);

// Exports schema instead of model in order
// to use as a sub-document to User.
module.exports = {documentsSchema, model};