const wait = require('wait.for-es6');
const configGen = require('./config');
const connector = require('./redisConnector');

var config = {};
var client = null;
var redis = null;

function start (path) {
	
	console.log('App starting');
	console.log('Loading config from ' + path);

	config = configGen.getConfig(path);
	console.log('--== CONFIGURATION ==--\n' + 
				JSON.stringify(config, null, 2) + 
				'\n-----------------------');

	connector.launchRedis(config);
	console.log('End of app start function');
}

module.exports = {start};