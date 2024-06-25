import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import App from './App.vue';
import router from './routes.js';

const app = createApp(App);
app.use(router);
app.mount('#app');