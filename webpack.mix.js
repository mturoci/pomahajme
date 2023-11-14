const mix = require('laravel-mix')

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

mix
  .setPublicPath('www')
  .sass('./resources/sass/app.scss', 'css')
  .sass('./resources/sass/story.scss', 'css')
  .sass('./resources/sass/euro.scss', 'css')
  .sass('./resources/sass/christmas.scss', 'css')
  .sass('./resources/sass/contact.scss', 'css')
  .sass('./resources/sass/login.scss', 'css')
  .sass('./resources/sass/admin.scss', 'css')
  .sass('./resources/sass/admin-story.scss', 'css')
  .sass('./resources/sass/stats.scss', 'css')
  .js('./resources/js/messenger.js', 'js')
  .version()
  .disableNotifications()