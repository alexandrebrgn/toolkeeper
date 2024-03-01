<template>
  <div class="container">
    <header class="jumbotron">
      <h3>
        <strong>{{currentUser.firstName}}</strong> Profile <!-- changer données username par firstName etc...-->
      </h3>
    </header>
    <p>
      <strong>Token:</strong>
      {{currentUser.token.substring(0,10)}} ... {{currentUser.token.substr(currentUser.token.length - 10)}}
    </p>
    <p>
      <strong>Nom:</strong>
      {{currentUser.lastName}} {{currentUser.firstName}}
    </p>
    <p>
      <strong>Email:</strong>
      {{currentUser.email}}
    </p>
    <strong>Authorities:</strong>
    <ul>
      <li v-for="role in currentUser.roles" :key="role">{{role}}</li> <!-- Jcrois ca va pas marcher ça-->
    </ul>
  </div>
</template>

<script>
export default {
  name: 'Profile',
  computed: {
    currentUser() {
      console.log(this.$store);
      return this.$store.state.auth.user.success;
    }
  },
  mounted() {
    if (!this.currentUser) {
      this.$router.push('/login');
    }
  }
};
</script>