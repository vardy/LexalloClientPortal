const redis = require("redis");

var client = redis.createClient("redis://admin:test_pass@db:6379/0");

client.on("error", function (err) {
    console.log("Error " + err);
});

// Testing
client.set("string_key", "string val", redis.print);
client.hset("hash_key", "hashtest_1", "some value", redis.print);
client.hset(["hash_key", "hashtest_2", "some other value"], redis.print);

client.hkeys("hash key", function (err, replies) {

    console.log(replies.length + " replies:");
    
    replies.forEach(function (reply, i) {
        console.log("    " + i + ": " + reply);
    });
    client.quit();

});