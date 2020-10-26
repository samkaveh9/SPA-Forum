<template>
    <v-btn icon :color="color" class="mb-10" @click.prevent="likeIt">
        <v-icon>mdi-heart</v-icon> {{ count }}
    </v-btn>
</template>

<script>
import User from "../../Helpers/User";
export default {
    props: ["content"],

    created() {
       Echo.channel('likeChannel').listen('LikeEvent', (e) => {
           if(this.content.id == e.id){
               e.type == 1 ? this.count++ : this.count-- 
           }
    });
    },

    data() {
        return {
            liked: this.content.liked,
            count: this.content.like_count
        };
    },

    computed: {
        color() {
            return this.liked ? "red lighten-1" : "grey lighten-1";
        }
    },

    methods: {
        likeIt() {
            if (User.loggedIn()) {
                this.liked ? this.decr() : this.incr(),
                    (this.liked = !this.liked);
            }
        },
        incr() {
            axios
                .post(`/api/likes/${this.content.id}`)
                .then(res => this.count++);
        },
        decr() {
            axios
                .delete(`/api/likes/${this.content.id}`)
                .then(res => this.count--);
        }
    }
};
</script>
