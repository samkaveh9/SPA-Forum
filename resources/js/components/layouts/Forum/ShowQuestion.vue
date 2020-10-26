<template>
    <v-card>
        <v-container fluid>
            <v-card-title>
                <div>
                    <div class="headline">
                        {{ data.title }}
                    </div>
                    <span class="grey--text"
                        >{{ data.user }} said {{ data.created_at }}</span
                    >
                </div>
                <v-spacer></v-spacer>
                <v-btn
                    class="mx-2"
                    color="light-blue darken-2"
                    fab
                    dark
                    small
                    @click.prevent="destroy"
                >
                    <v-icon dark>
                        mdi-reply
                    </v-icon>
                    <v-badge
                        color="teal darken-3"
                        content=""
                        v-text="replyCount"
                    ></v-badge>
                </v-btn>
            </v-card-title>
            <v-card-text v-html="data.body"></v-card-text>

            <v-card-actions v-if="own">
                <v-btn
                    class="mx-2"
                    fab
                    dark
                    small
                    color="lime"
                    @click.prevent="edit"
                >
                    <v-icon dark>
                        mdi-pencil
                    </v-icon>
                </v-btn>

                <v-btn
                    class="mx-2"
                    color="red darken-1"
                    fab
                    dark
                    small
                    @click.prevent="destroy"
                >
                    <v-icon dark>
                        mdi-delete
                    </v-icon>
                </v-btn>
            </v-card-actions>
        </v-container>
    </v-card>
</template>

<script>
export default {
    props: ["data"],
    data() {
        return {
            own: User.own(this.data.user_id),
            replyCount: this.data.reply_count
        };
    },
    created() {
        EventBus.$on("newReply", () => {
            this.replyCount++;
        });
    },
    methods: {
        destroy() {
            axios
                .delete(`/api/question/${this.data.slug}`)
                .then(res => this.$router.push("/forum"))
                .catch(error => console.log(error.response.data));
        },
        edit() {
            EventBus.$emit("startEditing");
        }
    }
};
</script>

<style></style>
