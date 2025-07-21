const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('autoprefixer'),
        require('tailwindcss'),
    ]);
mix.vue({
  version: 3,
  options: {
    compilerOptions: {
      isCustomElement: tag => false,
    },
    define: {
      __VUE_OPTIONS_API__: true,
      __VUE_PROD_DEVTOOLS__: false,
    },
  },
});
