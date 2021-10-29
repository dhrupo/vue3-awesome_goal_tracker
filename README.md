# vue3-awesome_goal_tracker

step-1:

1. install vue using vue cli
   npm install -g @vue/cli

2. add package.json file
   npm init

3. install vue latest version (version 3)
   npm i vue@next

4. on src folder add two file naming main.js and app.js

5. on main.js:
   import { createApp } from 'vue'
   import App from './App.vue'
   createApp(App).mount('#agt-admin-app')

6. on App.vue:

"<template>
  <div id="agt-admin-app">{{ msg }}</div>
</template>
<script>
export default {
  data() {
    return {
      msg: "hello from admin vue panel",
    };
  },
};
</script>"

step-2: install laravel-mix and setup this

1. install laravel-mix
   npm i laravel-mix

2. on root folder create assets folder. under asstes folder create admin folder and then create admin.js file.

3. add a file naming webpack.mix.js and add the text:
   let mix = require('laravel-mix');
   mix.js('src/main.js', 'assets/admin/admin.js').vue({ version: 3 });

4. replace scripts with these text on package.json
"
   "scripts": {
   "development": "mix",
   "watch": "mix watch",
   "watch-poll": "mix watch -- --watch-options-poll=1000",
   "hot": "mix watch --hot",
   "production": "mix --production"
   },
"

step-3: register and enqueue scripts from wordpress side and target 'assets/admin/admin.js'

step-4: install vue-template-compiler
npm i vue-template-compiler

step-5: run command 'npm run watch' then ENJOY!!!
