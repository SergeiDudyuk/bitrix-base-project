const merge = require('webpack-merge');
const baseConfig = require('./base.config');

const config = merge(baseConfig, {
	devtool: 'source-map',
  watchOptions: {
    poll: 1000,
    ignored: [
      /bitrix/,
      /upload/,
      /sites/,
      /data/,
      /node_modules/,
      /vendor/,
    ],
  }
});

module.exports = config;