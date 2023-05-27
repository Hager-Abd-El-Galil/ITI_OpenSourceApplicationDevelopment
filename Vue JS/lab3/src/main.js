import { createApp } from 'vue'
import App from './App.vue'
import { createRouter, createWebHistory } from 'vue-router'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import allStudentsApp from './components/pages/allStudents.vue';
import studentDetails from './components/pages/studentDetails.vue';
import errorPage from './components/pages/error.vue';

const routes = [
    {
        path: '/',component: allStudentsApp,alias:'/students'
    },
    {
        path: '/students/:id',component: studentDetails
    },
    {
        path: '/:NotFound(.*)*',component: errorPage, meta:{hideNavbar:true}
    }
];

const router = createRouter({
    history:createWebHistory(),
    routes
})
const app = createApp(App);

app.directive("theme",{
    mounted(element,binding){
        if(binding.value === 'dark'){
            element.style.backgroundColor = '#343a40';
            element.style.color = '#c2a085'

        }else{
            element.style.backgroundColor = '#f8f9fa';
            element.style.color = '#c2a085'
        }
    }
})

.use(router).mount('#app')
