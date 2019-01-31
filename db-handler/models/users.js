var mongoose = require('mongoose');
var Schema = mongoose.Schema;

var usersSchema = new Schema ({
    name: String,
    test1: String,
    test2: String
});

module.exports = mongoose.model('User', usersSchema);