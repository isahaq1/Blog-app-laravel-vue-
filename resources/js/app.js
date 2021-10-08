import { createApp } from 'vue';
import FrontPage from './components/FrontPage.vue';

const app = createApp({});
app.component('website', FrontPage)
    .mount('#app');

require('./bootstrap');
require('admin-lte');
import 'bootstrap/dist/css/bootstrap.min.css'