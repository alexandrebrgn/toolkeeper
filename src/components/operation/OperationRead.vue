<template>
  <div class="container min-vh-100">
    <div class="card">
      <header class="jumbotron">
        <h1 class="operation-title">Opération de maintenance n°{{operation.id}}</h1>
        <h3>Effectuée le {{operation.date}}</h3>
  <!--      <h2 class="tool-title">Equipement n°{{operation.tool.id}}</h2>-->
        <h2>Rapport d'opération de maintenance</h2>
        <p>{{operation.report}}</p>
        <router-link to="/tool">
        <button>
          <p>Bonsoir</p>
        </button>
        </router-link>
      </header>
    </div>
  </div>
</template>

<script>
import OperationService from "../../services/operation.service.js";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Tools",
  data() {
    return {
      operation: "",
    };
  },
  mounted() {
    OperationService.readOperation(this.$route.params.id).then(
        (response) => {
          this.operation = response.data;
          console.log('OperationRead.vue - OperationService.readOperation().then() : ', this.operation);
        },
        (error) => {
          this.tool = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
        }
    );
  },
};
</script>