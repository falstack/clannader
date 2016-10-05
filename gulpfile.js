const elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.version('public/dist/js/*.js');
});