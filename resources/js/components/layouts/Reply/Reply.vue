<template>
    <div class="mt-3">
        <v-card>
            <v-card-title primary-title>
                <v-card-text class="headline">
                    {{ data.user }} said:
                </v-card-text>
                <div class="mr-3">{{ data.created_at }}</div>
                <v-spacer></v-spacer>
                <Like :content="data"></Like>
            </v-card-title>
            <v-divider></v-divider>

            <EditReply v-if="editing" :reply="data"></EditReply>

            <v-card-text v-else v-html="data.reply"></v-card-text>

            <v-divider></v-divider>

            <div v-if="!editing">
                <v-card-actions v-if="own">
                    <v-btn
                        @click.prevent="edit"
                        fab
                        dark
                        small
                        class="mx-2"
                        color="lime darken-3"
                    >
                        <v-icon>mdi-pencil</v-icon>
                    </v-btn>
                    <v-btn
                        @click.prevent="destroy"
                        fab
                        dark
                        small
                        class="mx-2"
                        color="deep-orange darken-2"
                    >
                        <v-icon>mdi-delete</v-icon>
                    </v-btn>
                </v-card-actions>
            </div>
        </v-card>
    </div>
</template>

<script>
import EditReply from "./EditReply";
import Like from "../Likes/Like";
export default {
    props: ["data", "index"],
    components: {
        EditReply,
        Like
    },
    data() {
        return {
            editing: false
            // beforeEditReplyBody:''
        };
    },
    computed: {
        own() {
            return User.own(this.data.user_id);
        },

        reply() {
            return md.parse(this.data.reply);
        }
    },
    created() {
        this.listen();
    },
    methods: {
        destroy() {
            EventBus.$emit("deleteReply", this.index);
        },
        edit() {
            (this.editing = true), (this.beforeEditReplyBody = this.data.reply);
        },
        listen() {
            EventBus.$on("cancelEditing", reply => {
                this.editing = false;
                // if(reply !== this.data.reply){
                //     this.data.reply = this.beforeEditReplyBody
                //     this.beforeEditReplyBody = ''
                // }
            });
        }
    }
};
</script>
