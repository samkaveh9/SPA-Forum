<template>
    <v-container>
        <v-row>
            <v-col>
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

                    <v-form @submit.prevent="store">
                         <v-text-field
                        class="my-3 py-7"
                        v-model="form.name"
                        label="عنوان"
                        required
                    ></v-text-field>
                    <v-btn color="success" type="submit">text</v-btn>
                    </v-form>

                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {

    created() {
       this.$set(this.form.name, 1)
    },
    data() {
        return {

            form:{
                name:''
            },
            categories:{}


        };
    },

    methods: {

        store()
        {
            axios.post('/api/categories',this.form)
            .then(res => this.$router.push({name:'category'}))
        }

    }
};
</script>
