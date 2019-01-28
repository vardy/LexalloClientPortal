const fs = require('fs');

function getConfig (path) {
	// Redis IP
	// Redis DB
	// Redis User
	// Redis Pass
	// Redis container Name
	// Redis Port
	return JSON.parse(fs.readFileSync(path, 'utf8'));
}

module.exports = {getConfig};