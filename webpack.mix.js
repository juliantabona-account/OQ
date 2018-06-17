let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')

   .copy('node_modules/mdi/css/materialdesignicons.min.css', 'public/css/plugins/mdi/css/materialdesignicons.min.css')
   .copy('node_modules/mdi/fonts', 'public/css/plugins/mdi/fonts')
   .copy('node_modules/simple-line-icons/css/simple-line-icons.css', 'public/css/plugins/simple-line-icons/css/simple-line-icons.css')
   .copy('node_modules/simple-line-icons/fonts', 'public/css/plugins/simple-line-icons/fonts')
   .copy('node_modules/flag-icon-css/css/flag-icon.min.css', 'public/css/plugins/flag-icon-css/css/flag-icon.min.css')
   .copy('node_modules/flag-icon-css/flags', 'public/css/plugins/flag-icon-css/flags')
   .copy('node_modules/perfect-scrollbar/dist/css/perfect-scrollbar.min.css', 'public/css/plugins/perfect-scrollbar/dist/css/perfect-scrollbar.min.css')
   .copy('node_modules/font-awesome/css/font-awesome.min.css', 'public/css/plugins/font-awesome/css/font-awesome.min.css')
   .copy('node_modules/font-awesome/fonts', 'public/css/plugins/font-awesome/fonts')
   .copy('node_modules/jquery-bar-rating/dist/themes/fontawesome-stars.css', 'public/css/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')

   .copy('node_modules/jquery/dist/jquery.min.js', 'public/js/plugins/jquery/dist/jquery.min.js')
   .copy('node_modules/popper.js/dist/umd/popper.min.js', 'public/js/plugins/popper.js/dist/umd/popper.min.js')
   .copy('node_modules/bootstrap/dist/js/bootstrap.min.js', 'public/js/plugins/bootstrap/dist/js/bootstrap.min.js')
   .copy('node_modules/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js', 'public/js/plugins/perfect-scrollbar/dist/js/perfect-scrollbar.jquery.min.js')

   .copy('node_modules/jquery-bar-rating/dist/jquery.barrating.min.js', 'public/js/plugins/jquery-bar-rating/dist/jquery.barrating.min.js')
   .copy('node_modules/chart.js/dist/Chart.min.js', 'public/js/plugins/chart.js/dist/Chart.min.js')
   .copy('node_modules/raphael/raphael.min.js', 'public/js/plugins/raphael/raphael.min.js')
   .copy('node_modules/morris.js/morris.min.js', 'public/js/plugins/morris.js/morris.min.js')
   .copy('node_modules/jquery-sparkline/jquery.sparkline.min.js', 'public/js/plugins/jquery-sparkline/jquery.sparkline.min.js')
   .copy('node_modules/fullcalendar/dist/fullcalendar.min.js', 'public/js/plugins/fullcalendar/dist/fullcalendar.min.js')
   .copy('node_modules/fullcalendar/dist/fullcalendar.css', 'public/css/plugins/fullcalendar/dist/fullcalendar.css')
   .copy('node_modules/inputmask/dist/jquery.inputmask.bundle.js', 'public/css/plugins/inputmask/dist/jquery.inputmask.bundle.js')

   .copy('node_modules/inputmask/dist/inputmask/phone-codes/phone.js', 'public/css/plugins/inputmask/dist/inputmask/phone-codes/phone.js')
   .copy('node_modules/inputmask/dist/inputmask/phone-codes/phone-be.js', 'public/css/plugins/inputmask/dist/inputmask/phone-codes/phone-be.js')
   .copy('node_modules/inputmask/dist/inputmask/phone-codes/phone-ru.js', 'public/css/plugins/inputmask/dist/inputmask/phone-codes/phone-ru.js')
   .copy('node_modules/inputmask/dist/inputmask/bindings/inputmask.binding.js', 'public/css/plugins/inputmask/dist/inputmask/bindings/inputmask.binding.js')
   
   .sass('resources/assets/sass/app.scss', 'public/css');
