<template>
    <div>
        <Toolbar></Toolbar>
        <router-view></router-view>
        <Footer></Footer>
    </div>
</template>

<script>
import Toolbar from './layouts/Section/Toolbar';
import Footer from './layouts/Section/Footer'
import Login from './layouts/Auth/Login'
export default {
    components:{
        Toolbar,
        Footer,
        Login
    }
}
</script>