module.exports = {
  transpileDependencies: [
    'vuetify'
  ],
  devServer: {
    proxy: {
      '^/api/': {
        target: 'http://localhost:8888',
        changeOrigin: true, // so CORS doesn't bite us. 
      }
    }
  }
}
