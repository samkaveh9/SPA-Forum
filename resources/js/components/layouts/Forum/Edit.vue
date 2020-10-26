<template>
    <v-container fluid>
        <v-card>
            <v-form @submit.prevent="update">
                <v-text-field
                    label="Title"
                    v-model="form.title"
                    type="text"
                    required
                ></v-text-field>
                <vue-simplemde v-model="form.body" ref="markdownEditor" />

                <v-card-actions>
                    <v-btn
                        class="mx-2 darken-3"
                        fab
                        dark
                        small
                        color="purple"
                        type="submit"
                    >
                        <v-icon dark>mdi-content-save</v-icon>
                    </v-btn>

                    <v-btn
                        class="mx-2 darken-2"
                        fab
                        dark
                        small
                        color="pink"
                        @click.prevent="cancel"
                    >
                        <v-icon dark>mdi-close-circle</v-icon>
                    </v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
    </v-container>
</template>

<script>
import VueSimplemde from "vue-simplemde";
export default {
    props: ["data"],
    data() {
        return {
            form: {
                title: null,
                body: null
            }
        };
    },
    methods: {
        cancel() {
            EventBus.$emit("cancelEditing");
        },
        update() {
            axios
                .patch(`/api/question/${this.form.slug}`, this.form)
                .then(res => this.cancel());
        }
    },
    created() {
        this.form = this.data;
    }
};
</script>

<style></style>
