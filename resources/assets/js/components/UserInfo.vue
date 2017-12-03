<template>
  <div v-show="user.email">
    <p><strong>Name:</strong> {{ user.name }}</p>
    <p><strong>Email:</strong> {{ user.email }}</p>
    <p><strong>Address:</strong> {{ user.address }}</p>
  </div>
</template>

<script>
export default {  
  props: ['id'],

  data() {
    return {
      user: {}
    };
  },

  mounted() {
    if (this.id) {
      this.getUser(this.id);
    }
  },

  methods: {
    getUser(id) {      
      axios.get(`/api/users/${id}`)
        .then(({ data }) => {
          this.user = data.data;
        })
    }
  }
};
</script>
