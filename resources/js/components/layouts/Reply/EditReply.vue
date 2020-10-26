<template>
     <v-card>
                <v-card-text>
                    <v-container>
                        <v-row>
                            <v-col cols="12">
                                <vue-simplemde
                                    ref="markdownEditor"
                                    v-model="reply.reply"
                                />
                            </v-col>
                        </v-row>
                    </v-container>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn color="blue darken-1" text @click.prevent="cancel">
                        Close
                    </v-btn>
                    <v-btn color="blue darken-1" text @click.prevent="update">
                        Save
                    </v-btn>
                </v-card-actions> 
            </v-card>
</template>

<script>
export default {
    props: ["reply"],

    methods: {
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update() {
            axios.patch(`/api/question/${this.reply.question_slug}/reply/${this.reply.id}`,{body:this.reply.reply})
                  .then(res => this.cancel())  
        },
    },


};
</script>
