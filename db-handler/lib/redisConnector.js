const redis = require('redis');
const wait = require('wait.for-es6');

var client = null;
var config = null;

function launchRedis (configImport) {
	config = configImport;
	wait.launchFiber(startClient);
}

function* startClient () {

	var connectionString = getRedisConnectString(config);
	console.log('Using connection string: ' + connectionString + ' to start client.');
	client = yield wait.for(redis.createClient(connectionString));
	
	client.on("error", function (err) {
	    console.log("Error " + err);
	});
	
	client.set('hello', 'world');
	console.log(client.get('hello'));
	console.log('End of startClient function');
}

function kill () {
	client.quit();
}

function getRedisConnectString (config) {
	const redisDockerContainerName = config.redisDockerContainerName;
	const redisPort = config.redisPort;
	const redisDBNumber = config.redisDBNumber;
	const redisUser = config.redisUser;
	const redisPass = config.redisPass;

	return 'redis://' + redisUser + ':' + redisPass + '@' + redisDockerContainerName + ':' + redisPort + '/' + redisDBNumber;
}

module.exports = {client, redis, kill, launchRedis};