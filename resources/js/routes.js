import AppHome from './components/layouts/Section/AppHome.vue'
import About from './components/layouts/Section/About.vue'
import Login from './components/layouts/Auth/Login.vue'
import Signup from './components/layouts/Auth/Signup.vue'
import Forum from './components/layouts/Forum/Forum.vue'
import Logout from './components/layouts/Auth/Logout.vue'
import Read from './components/layouts/Forum/Read.vue'
import Create from './components/layouts/Forum/Create.vue'
import CreateCategory from './components/layouts/Category/Create.vue'
import EditCategory from './components/layouts/Category/Edit.vue'
import Category from './components/layouts/Category/Category.vue'


export const routes = [
    {
        name:'home',
        path:'/',
        component: AppHome
    },
    { 
        name: 'login',
        path:'/login',
        component:Login
    },
    {
        name: 'signup',
        path: '/signup',
        component: Signup
    },
    { 
        name: 'logout',
        path:'/logout',
        component:Logout
    },
    {
        name: 'forum',
        path: '/forum',
        component: Forum
    },
    { 
        name: 'read',
        path:'/question/:slug',
        component:Read
    },
    { 
        name: 'ask',
        path: '/ask',
        component: Create
    },
    {
        name: 'category',
        path: '/category',
        component: Category
    },
    {
        name: 'create-category',
        path: '/create-category',
        component: CreateCategory
    },
    {
        name: 'edit-category',
        path: '/edit-category',
        component: EditCategory
    },
    {
        name: 'about',
        path:'/about',
        component: About
    }

]