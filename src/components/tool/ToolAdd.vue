<template>
  <div class="container min-vh-100">
    <header class="jumbotron">

      <p>Catégorie de l'équipement</p>
      <!--      <p>Selected: {{ form.operator_id }}</p>-->
      <select v-model="form.category_id">
        <option disabled value="" class="disabled-option">Sélectionnez une catégorie d'équipement</option>
        <option v-for="category in categories" :key="category.id" :value="category.id">
          {{ category.name }}
        </option>
      </select>
      <p></p>

      <p>Nom / numéro de l'équipement :</p>
      <input type="text" v-model="form.number">

      <p>Numéro de série de l'équipement :</p>
      <input type="text" v-model="form.serialId">

      <p>Localisation de l'équipement :</p>
      <input type="text" v-model="form.localisation">

      <p>Date de la prochaine opération :</p>
      <input type="date" v-model="form.dateNextOperation">

      <p></p>
      <button @click="submit">
        Envoyer
      </button>
    </header>
  </div>
</template>

<style>
.disabled-option {
  font-style: italic;
}
</style>

<!--<script setup>-->
<!--import { ref } from 'vue';-->

<!--const operator_id = ref('')-->
<!--const tool_id = ref('')-->
<!--</script>-->

<script>
import ToolService from "../../services/tool.service.js";
import CategoryService from "../../services/category.service.js";

export default {

  // eslint-disable-next-line vue/multi-word-component-names
  name: "Operation",
  data() {
    return {
      categories: "",
      form: {
        number: "",
        serialId: "",
        localisation: "",
        dateNextOperation: "",
        category_id: "",
      }
    };
  },
  methods: {
    submit() {
      ToolService.addTool(this.form.number, this.form.serialId, this.form.localisation, this.form.dateNextOperation, this.form.category_id).then(
          (response) => {
            console.log('ToolAdd.vue - ToolService.getAllTool().then() : ', response);
            this.$router.push('/tool')
          },
          (error) => {
            this.tool = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
          }
      );
      console.log('ToolAdd.vue - OperationService.addOperation()')
    },
    categoriesData() {
      CategoryService.getAllCategory().then(
          (response) => {
            this.categories = response.data;
            console.log('ToolAdd.vue - CategoryService.getAllCategory().then() : ', this.categories);
          },
          (error) => {
            this.categories = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
          }
      );
    }
  },
  mounted() { // Exécutés à l'initialisation
    this.categoriesData();
  },
};
</script>