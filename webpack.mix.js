const mix = require('laravel-mix');

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

// separo gli stili e i javascript in base alle cartelle create (admin e guest)
// da app.js creo 2 file js (admin e guest) e separo le dipendenze (Bootstrap in "admin" / Vue in "guest")
// in sass creo 2 cartelle (admin e guest) ognuna con il suo style.scss (admin ha anche le _variables)
// poi aggiungo le options per i background-img  

mix.js('resources/js/admin.js', 'public/js')
    .js('resources/js/guest.js', 'public/js')
    .sass('resources/sass/admin/style.scss', 'public/css/admin')
    .sass('resources/sass/guest/style.scss', 'public/css/guest')
    .options({
		processCssUrls: false
	});
