let mix = require('laravel-mix')
require('./nova.mix.js');

mix.setPublicPath('dist')
    .js('resources/js/field.js', 'js')
    .sass('resources/sass/field.scss', 'css')
    .vue({ version: 3 })
    .nova('superlatif/nova-tag-input')
