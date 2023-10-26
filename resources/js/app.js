import('./bootstrap');

window.Vue = import('vue').default;
import { createApp } from 'vue'
import App from './App.vue'
import { createRouter,createWebHashHistory} from 'vue-router' ; 

const router = new createRouter({
    history: createWebHashHistory(),
    routes: [{
        path: '/',
        name: 'home',
        component: import('./App.vue').default
    }
    ]
})

createApp(App).mount('#app');

