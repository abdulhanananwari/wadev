process.env.DISABLE_NOTIFIER = true;
const elixir = require('laravel-elixir');

// require('laravel-elixir-react');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {

    mix.scriptsIn('Wadev/Site/Resources/Angular/Admin', 'public/wadev/site/admin/app/all.js');
    mix.copy('Wadev/Site/Resources/Angular/Admin', 'public/wadev/site/admin');

});