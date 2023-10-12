
import './bootstrap';
import { createApp } from 'vue';
import homePage from '../js/pages/homePage.vue';



const app = createApp();


app.component('home-page', homePage);




app.mount('#app');
