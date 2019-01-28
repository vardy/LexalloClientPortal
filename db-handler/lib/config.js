const fs = require('fs');

function getConfig (path) {
	return JSON.parse(fs.readFileSync(path, 'utf8'));
}

module.exports = {getConfig};