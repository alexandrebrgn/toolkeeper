<template>
  <div class="container min-vh-100">
    <header class="jumbotron">

      <p>Nom de la nouvelle catégorie d'équipements</p>
      <input type="text" v-model="form.name">

      <p></p>
      <button @click="submit">
        Envoyer
      </button>
    </header>
  </div>
</template>
<script>

import CategoryService from "../../services/category.service.js";

export default {

  // eslint-disable-next-line vue/multi-word-component-names
  name: "Category",
  data() {
    return {
      form: {
        name: "",
      }
    };
  },
  methods: {
    submit() {
      CategoryService.addCategory(this.form.name).then(
          (response) => {
            console.log('CategoryAdd.vue - CategoryService.addCategory().then() : ', response);
            this.$router.push('/category')
          },
          (error) => {
            this.category = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
          }
      );
    },
  },
  mounted() { // Exécutés à l'initialisation
  },
};
</script>