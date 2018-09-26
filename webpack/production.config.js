const path = require('path');
const merge = require('webpack-merge');
const baseConfig = require('./base.config');

const config = merge(baseConfig, {
	output: {
		path: path.resolve('./local/assets/pre-build')
	},
	devtool: false
});

module.exports = config;