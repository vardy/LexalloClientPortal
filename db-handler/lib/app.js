const configGen = require('./config');
const connector = require('./redisConnector');

var config = {};

function start (path) {
	
	console.log('... App starting');
	console.log('... Loading config from ' + path);

	config = configGen.getConfig(path);
	console.log('----------------------------------------------\n' +
				JSON.stringify(config, null, 2) + 
				'\n----------------------------------------------');

	connector.startClient(config);
}

module.exports = {start};