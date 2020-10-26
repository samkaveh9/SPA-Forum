<template>
    <v-footer color="blue-grey lighten-1" padless absolute>
        <v-row justify="center" no-gutters>
            <v-btn
                v-for="link in links"
                :key="link.title"
                color="white"
                text
                rounded
                class="my-2"
            >
                <router-link
                    class="text-decoration-none white--text"
                    :to="link.path"
                    >{{ link.title }}</router-link
                >
            </v-btn>
            <v-col
                class="blue-grey lighten-1 py-4 text-center white--text"
                cols="12"
            >
                {{ new Date().getFullYear() }} — <strong>Gap</strong>
            </v-col>
        </v-row>
    </v-footer>
</template>

<script>
export default {
    data() {
        return {
            links: [
                { title: "Home", name: "home", path: "/" },
                { title: "Forum", name: "forum", path: "/forum" },
                { title: "Ask Question", name: "ask", path: "/ask" },
                { title: "About us", name: "about", path: "/about" },
                { title: "Sign up", name: "signup", path: "/signup" }
            ]
        };
    }
};
</script>

<style scoped>
#footer {
    position: fixed;
    bottom: 0px;
}
</style>
