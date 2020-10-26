<template>
    <div>
    <v-row justify="center" v-if="!show">
        <v-dialog v-model="dialog" persistent max-width="600px">
            <template v-slot:activator="{ on, attrs }">
                <v-btn
                    class="mx-2 mb-5"
                    fab
                    dark
                    color="indigo"
                    id="fixedbutton"
                    v-bind="attrs"
                    v-on="on"
                absolute
                >
                    <v-icon dark>
                        mdi-plus
                    </v-icon>
                </v-btn>
            </template>
            <v-card>
                <v-card-text>
                    <v-container>
                        <h4>New Reply</h4>
                        <v-row>
                            <v-col cols="12">
                                <vue-simplemde
                                    v-model="form.body"
                                    ref="markdownEditor"
                                />
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click="dialog = false">
                        Close
                    </v-btn>
                    <v-btn color="blue darken-1" text @click="submit">
                        Save
                    </v-btn>
                </v-card-actions> 
            </v-card>
        </v-dialog>
    </v-row>
    <!-- <v-row v-else></v-row> -->
    </div>
</template>

<script>
import VueSimplemde from "vue-simplemde";
import User from '../../Helpers/User';

export default {
    props: ["questionSlug"],

    data() {
        return {
            dialog: false,
            form:{
                body:null
            }
        };
    },

    computed: {
        addReply(){
            // if (User.loggedIn()) {
            //     return true
            // }
            // return false
            console.log(User.loggedIn())
        }
    },

    methods: {
        submit() {
            axios
                .post(`/api/question/${this.questionSlug}/reply`, this.form)
                .then(res => {
                    this.form.body = null,
                    this.dialog = false,
                    this.$router.go(0)
         });
        }
    },

};
</script>

<style scoped>
#fixedbutton {
    position: fixed;
    bottom: 0px;
    right: 0px;
}
</style>
