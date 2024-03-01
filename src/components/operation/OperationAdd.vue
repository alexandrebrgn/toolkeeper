<template>
  <div class="container min-vh-100">
    <header class="jumbotron">

<!--      <p>Selected: {{ form.operator_id }}</p>-->
      <select v-model="form.operator_id">
        <option disabled value="" class="disabled-option">Sélectionnez un opérateur</option>
        <option v-for="operator in operators" :key="operator.id" :value="operator.id">
          {{ operator.firstName }}
        </option>
      </select>
      <p></p>

<!--      <p>Selected: {{ form.tool_id }}</p>-->
      <select v-model="form.tool_id">
        <option disabled value="" class="disabled-option">Sélectionnez un équipement</option>
        <option v-for="tool in tools" :key="tool.id" :value="tool.id">
          {{ tool.number }}
        </option>
      </select>

      <p>Sélectionner la date</p>
      <input type="date" v-model="form.date">

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
import OperationService from "../../services/operation.service.js";
import UserService from "../../services/user.service.js";

export default {

  // eslint-disable-next-line vue/multi-word-component-names
  name: "Operation",
  data() {
    return {
      tools: "",
      operators: "",
      form: {
        tool_id: "",
        operator_id: "",
        date: "",
      }
    };
  },
  methods: {
    submit() {
      OperationService.addOperation(this.form.operator_id, this.form.tool_id, this.form.date).then(
          (response) => {
            console.log('OperationAdd.vue - ToolService.getAllTool().then() : ', response);
            this.$router.push('/operation')
          },
          (error) => {
            this.tools = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
            this.toolsData();
          }
      );
      console.log('OperationAdd.vue - OperationService.addOperation()')
    },
    toolsData() {
      ToolService.getAllTool().then(
          (response) => {
            this.tools = response.data;
            console.log('OperationAdd.vue - ToolService.getAllTool().then() : ', this.tools);
          },
          (error) => {
            this.tools = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
          }
      );
    }
  },
  mounted() { // Exécutés à l'initialisation
    this.toolsData();
    UserService.getOperators().then(
        (response) => {
          this.operators = response.data;
          console.log('OperationAdd.vue - UserService.getOperators().then() : ', this.operators);
        },
        (error) => {
          this.operators = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
        }
    );
  },
};
</script>