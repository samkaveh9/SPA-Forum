<template>
    <v-card class="ml-5">
        <v-toolbar class="mt-2 grey darken-2" dark dense>
            <v-toolbar-title>Category</v-toolbar-title>
        </v-toolbar>

        <v-list>
            <v-list-item v-for="category in categories" :key="category.id">
                <v-list-item-title>
                    <v-list-item-subtitle class="mr-4">
                        {{ category.name }}
                    </v-list-item-subtitle>
                </v-list-item-title>
            </v-list-item>
        </v-list>
    </v-card>
</template>

<script>
export default {
    data() {
        return {
            categories: {}
        };
    },

    created() {
        axios
            .get("/api/categories")
            .then(res => (this.categories = res.data.data));
    }
};
</script>
