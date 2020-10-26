<template>
    <div>
        <v-toolbar flat class="blue-grey lighten-1">
            <v-toolbar-title>
                <router-link
                    :to="{ name: 'home' }"
                    class="text-decoration-none white--text"
                    >Gap</router-link
                >
            </v-toolbar-title>

            <v-spacer></v-spacer>
            <!-- <Notification></Notification> -->

            <router-link
                v-for="item in items"
                :key="item.title"
                :to="item.to"
                v-if="item.show"
            >
                <v-btn class="fluid mx-3 rounded-pill border-0">{{
                    item.title
                }}</v-btn>
            </router-link>
        </v-toolbar>
        <v-divider></v-divider>
    </div>
</template>

<script>
import User from "../../Helpers/User";
import Notification from "./Notification";
export default {
    components: {
        Notification
    },

    data() {
        return {
            items: [
                { title: "ّForum", to: "/forum", show: true },
                { title: "Ask Question", to: "/ask", show: User.loggedIn() },
                { title: "Category", to: "/category", show: User.admin() },
                { title: "Login", to: "/login", show: !User.loggedIn() },
                { title: "Logout", to: "/logout", show: User.loggedIn() }
            ]
        };
    },

    created() {
        EventBus.$on("logout", () => {
            User.logout();
        });
    }
};
</script>
