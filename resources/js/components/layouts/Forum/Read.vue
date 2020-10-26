<template>
    <div v-if="question">
        <Edit
         v-if="editing"
         :data = question
         ></Edit>

        <ShowQuestion
            v-else
            :data = question
            ></ShowQuestion>
            <newReply :questionSlug="question.slug"></newReply>


        <v-container>
            <Replies :question="question"></Replies>


            <!-- <new-reply v-if="loggedIn" :questionSlug="question.slug"></new-reply> -->
            
            <!-- <div class="mt-4" v-else >
            <router-link to="/login">Login in to Reply</router-link>
            </div> -->
        </v-container>
    </div>
</template>

<script>
import ShowQuestion from './ShoWQuestion'
import Edit from './Edit'
import Replies from '../Reply/Replies'
import newReply from '../Reply/newReply'
export default {
    components:{ShowQuestion,Edit,Replies,newReply},

    data(){
        return {
            question:null,
            editing:false
        }
    },
    created(){
        this.listen()
        this.getQuestion()
    },
    computed:{
        loggedIn(){
            return User.loggedIn()
        }
    },
    methods:{
        listen(){
            EventBus.$on('startEditing',()=>{
                this.editing = true
            })
            EventBus.$on('cancelEditing',()=>{
                this.editing = false
            })
        },
        getQuestion(){
            axios.get(`/api/question/${this.$route.params.slug}`)
            .then(res => this.question = res.data.data)
        }
    }
}
</script>


<style>
</style>