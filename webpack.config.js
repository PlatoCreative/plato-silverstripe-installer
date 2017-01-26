const webpack = require('webpack');
const path = require('path');

const isProduction = process.env.NODE_ENV === 'production';

module.exports = {
  
  resolve: {
    extensions: ['', '.js', '.jsx'],
  },

  devtool: isProduction ? null : 'source-map',

  plugins: [

    isProduction ? new webpack.optimize.UglifyJsPlugin({
      compress: {
        warnings: false,
      },
    }) : null,

    new webpack.DefinePlugin({
      'process.env': {
        NODE_ENV: '\'' + process.env.NODE_ENV + '\'',
      },
    }),

  ].filter(plugin => plugin),
};
