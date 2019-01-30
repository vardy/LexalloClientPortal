const redis = require('redis');

var client = null;
var config = {};

function startClient (configImport) {
	config = configImport;

	var connectionString = genConnectAddress(config);
	console.log('Using connection string: ' + connectionString + ' to start client.');
	client = redis.createClient(connectionString);
	
	client.on("error", function (err) {
	    console.log("Error " + err);
	});

	client.on("ready", function (err) {
		console.log("Readis client ready.");

		client.get('Hello World', function (err, reply) {
			if (err) throw err;
			console.log(reply);
		});
	});
}

function kill () {
	client.quit();
}

function getClient () {
	return client;
}

function genConnectAddress (config) {
	const redisDockerContainerName = config.redisDockerContainerName;
	const redisPort = config.redisPort;
	const redisDBNumber = config.redisDBNumber;
	const redisUser = config.redisUser;
	const redisPass = config.redisPass;

	return 'redis://' + redisUser + ':' + redisPass + '@' + redisDockerContainerName + ':' + redisPort + '/' + redisDBNumber;
}

module.exports = {client, redis, kill, startClient, getClient};