const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .vue() // WAJIB agar file .vue bisa di-compile!
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
       require('autoprefixer'),
   ]);
   
