const path = require('path');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin');

module.exports = env => {
  return {
    mode: env.production ? 'production' : 'development',
    entry: {
        app: './src/app.js',
        editor: './src/editor.js'
    },
    output: {
      filename: '[name].js',
      path: path.resolve(__dirname, 'dist')
    },
    devtool: 'source-map',
    module: {
      rules: [
        {
          test: /\.(js|jsx)$/,
          exclude: /(node_modules)/,
          use: [
            'babel-loader'
          ]
        },
        {
          test: /\.styl$/,
          use: [
            MiniCssExtractPlugin.loader,
            {
              loader: 'css-loader',
              options: {
                sourceMap: true
              }
            },
            {
              loader: 'stylus-loader',
              options: {
                sourceMap: true
              }
            }
          ]
        },
        {
            test: /\.css$/,
            use: [
                {
                    loader: 'style-loader',
                    options: {
                        sourceMap: true
                    }
                },
                {
                    loader: 'css-loader',
                    options: {
                        sourceMap: true
                    }
                }
            ],
        },
        {
          test: /\.(png|jp(e*)g|gif)$/,
          use: [
            'file-loader'
          ]
        },
        {
          test: /\.(woff|woff2|svg|eot|ttf|otf)$/,
          use: [
            'file-loader'
          ]
        }
      ]
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: '[name].css'
      })
    ],
    optimization: {
      splitChunks: {
        cacheGroups: {
          commons: {
            test: /[\\/]node_modules[\\/]/,
            name: 'vendor',
            chunks: 'all',
            filename: 'vendor.js'
          }
        }
      },
      minimizer: [
        new UglifyJsPlugin(),
        new OptimizeCSSAssetsPlugin()
      ]
    },
    externals: {
      jquery: 'jQuery'
    }
  }
}
