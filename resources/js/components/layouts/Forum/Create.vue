<template>
    <v-container>
        <v-form @submit.prevent="submit">
            <v-text-field
            class="my-7"
                v-model="form.title"
                label="Title"
                required
            ></v-text-field>
            <v-card-text>Content</v-card-text>
                 <vue-simplemde v-model="form.body" ref="markdownEditor" />
            <v-select
            class="my-7"
                v-model="form.category_id"
                :items="categories"
                item-text="name"
                item-value="id"
                label="Category"
                required
            ></v-select>
            <v-btn block color="primary flat my-6" dark type="submit">Submit</v-btn>
        </v-form>
    </v-container>
</template>

<script>
import VueSimplemde from 'vue-simplemde'
export default {

    components: {
      VueSimplemde
    },

    data() {
        return {
            form: {
                title: null,
                body: null,
                category_id: null
            },
            categories: {},
            errors:{}
        };
        
    },

    created() {
        axios.get("/api/categories")
            .then(res => this.categories = res.data.data);
    },

    methods: {
        submit() {

             axios.post("/api/question",this.form)
             .then(res => this.$router.push(res.data.path))  
             .catch(error => this.errors = error.response.data.error) 

        }
    }
};
</script>


<style scope>
  @import '~simplemde/dist/simplemde.min.css';
</style>