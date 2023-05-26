import { createApp } from 'vue'
import App from './App.vue'
import { createRouter, createWebHistory } from 'vue-router'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import allStudentsApp from './components/pages/allStudents.vue';
import studentDetails from './components/pages/studentDetails.vue';
import addStudent from './components/pages/addStudent.vue';
import updateStudent from './components/pages/updateStudent.vue';
import errorPage from './components/pages/error.vue';

const routes = [
    {
        path: '/',component: allStudentsApp,alias:'/students'
    },
    {
        path: '/students/:id',component: studentDetails
    },
    {
        path: '/students/create',component: addStudent
    },
    {
        path: '/students/edit/:id',component: updateStudent
    },
    {
        path: '/:NotFound(.*)*',component: errorPage, meta:{hideNavbar:true}
    }
];

const router = createRouter({
    history:createWebHistory(),
    routes
})


createApp(App).use(router).mount('#app')
