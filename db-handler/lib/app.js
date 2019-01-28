const configGen = require('./config');
const connector= require('./redisConnector');

const client = connector.client;
const redis = connector.redis;

var config = {};

function start (configPath) {
	config = configGen.getConfig(configPath);
	console.log('--== CONFIGURATION ==--\n' + 
				JSON.stringify(config, null, 2) + 
				'\n-----------------------');

	// Test
	client.set("string_key", "string val", redis.print);
	client.hset("hash_key", "hashtest_1", "some value", redis.print);
	client.hset(["hash_key", "hashtest_2", "some other value"], redis.print);

	client.hkeys("hash_key", function (err, replies) {
	    console.log(replies.length + " replies:");
	    
	    replies.forEach(function (reply, i) {
	        console.log("    " + i + ": " + reply);
	    });
	});
}

module.exports = {start};