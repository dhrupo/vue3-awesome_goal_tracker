let mix = require('laravel-mix');

// mix.js('src/main.js', 'assets/admin/admin.js').vue({ version: 3 }).sourceMaps().sass('src/main.scss', 'assets/admin/admin.css')
mix.setPublicPath('assets');
mix.setResourceRoot('../../wp-content/plugins/awesome-goal-tracker/assets');
mix.js('src/main.js', 'assets/admin/admin.js').vue({ version: 3 })
  .sourceMaps(false)
