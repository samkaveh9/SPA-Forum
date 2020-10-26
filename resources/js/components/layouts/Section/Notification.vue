<template>
    <div class="text-center">
    <v-menu offset-y>
      <template v-slot:activator="{ on, attrs }">
            <v-btn icon color="pink" class="ml-8" v-bind="attrs" v-on="on">
        <v-icon>mdi-bell-outline</v-icon>
    </v-btn>
      </template>
      <v-list>
        <v-list-item>
          <v-list-item-title>test</v-list-item-title>
        </v-list-item>
      </v-list>
    </v-menu>
  </div>
</template>

<script>
import User from '../../Helpers/User'
export default {
  
  data() {
    return {
      read:{},
      unread:{},
      unreadCount: 0
    }
  },

  created() {
      if (User.loggedIn()) {
        this.getNotifications()
      }
  },

  methods: {
    // getNotifications()
    // {
    //   axios.post('/api/notifications')
    //   .then(res => {
    //       this.read = res.data.read,
    //       this.unread = res.data.unread,
    //       this.unreadCount = res.data.unread.length
    //   })
    // }
     getNotifications() {
      axios
        .post("/api/notifications")
        .then(res => {
          this.read = res.data.read;
          this.unread = res.data.unread;
          this.unreadCount = res.data.unread.length;
        })
        // .catch(error => Exception.handle(error));
  },
  }



}
</script>