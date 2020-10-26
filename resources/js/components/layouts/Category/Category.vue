<template>
    <v-container>
        <v-row>
            <v-col>
                <v-form @submit.prevent="store">
                    <div>
                        <v-text-field
                            class="py-7"
                            v-model="form.name"
                            label="عنوان"
                            required
                        ></v-text-field>
                        <v-spacer></v-spacer>
                        <v-btn color="success" type="submit">ثبت</v-btn>
                    </div>
                </v-form>
                <v-card>
                    <v-toolbar
                        color="indigo lighten-3 "
                        class="mt-3"
                        dark
                        dense
                    >
                        <v-toolbar-title>دسته بندی</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-btn
                            icon
                            color="yellow accent-2"
                            @click.prevent="create"
                        >
                            <v-icon>mdi-plus-circle</v-icon>
                        </v-btn>
                    </v-toolbar>

                    <v-list>
                        <v-list-item
                            v-for="category in categories"
                            :key="category.id"
                        >
                            <v-list-item-title>
                                <v-list-item-subtitle class="mr-4 my-4">
                                    {{ category.name }}
                                </v-list-item-subtitle>
                                <hr />
                            </v-list-item-title>
                            <v-spacer></v-spacer>
                            <v-btn
                                @click.prevent="edit(index)"
                                fab
                                dark
                                small
                                class="mx-2"
                                color="yellow accent-4"
                            >
                                <v-icon>mdi-pencil</v-icon>
                            </v-btn>
                            <v-btn
                                @click.prevent="destory(category.slug)"
                                fab
                                dark
                                small
                                class="mx-2"
                                color="deep-orange darken-2"
                            >
                                <v-icon>mdi-delete</v-icon>
                            </v-btn>
                        </v-list-item>
                    </v-list>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import User from '../../Helpers/User';
export default {
    data() {
        return {
            form: {
                name: null
            },

            categories: {}
        };
    },

    created() {
        if (!User.admin()) {
            this.$router.push({name:'forum'})
        }
        axios
            .get("/api/categories")
            .then(res => (this.categories = res.data.data));
    },

    methods: {
        store() {
            axios
                .post("/api/categories", this.form)
                .then(res => {
                    this.categories = res.data,
                    this.$router.go(0),
                    this.form.name = null
                    });
        },

        destory(slug, index) {
            axios.delete(`/api/categories/${slug}`).then(res => {
                this.categories.splice(index, 1),
                    this.$router.go(0)
            });
        },

        edit(index ) {
           this.form.name = this.categories[index].name
        }
    }
};
</script>
