const redis = require("redis");

var client = redis.createClient("redis://admin:test_pass@db:6379/0");

client.on("error", function (err) {
    console.log("Error " + err);
});

function kill () {
	client.quit();
}

module.exports = {client, redis, kill};