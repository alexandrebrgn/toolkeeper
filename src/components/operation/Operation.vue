<template>
  <div class="container min-vh-100">
    <header class="jumbotron">

      <router-link to="/operationAdd">
        <button type="button" class="btn btn-primary">
          <p class="button-text"><span class="icon-plus">+ </span>Nouvelle opération de maintenance</p>
        </button>
      </router-link>

      <ul v-for="operation in operations" :key="operation.id">
        <li>
          {{operation.toDoDate}}
          |
          Rapport d'opération :
          <span v-if="operation.report">{{operation.report}}</span>
          <span v-else class="no-report">pas de rapport pour le moment</span>
          |
          {{operation.tool.number}}
            <font-awesome-icon icon="pencil" />
           |
          <router-link :to="{name: 'operation', params: {id: operation.id}}">
            <font-awesome-icon icon="eye" />
          </router-link>
        </li>
      </ul>

    </header>
  </div>
</template>

<style>
.no-report {
  font-style: italic;
  color: grey;
}

.button-text {
  margin: 0;
}

.icon-plus {
  font-weight: bold;
  margin: 0;
  padding: 0;
}

</style>

<script>
import OperationService from "../../services/operation.service.js";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Operation",
  data() {
    return {
      operations: "",
    };
  },
  mounted() {
    OperationService.getAllOperation().then(
        (response) => {
          this.operations = response.data;
          console.log('Operation.vue - OperationService.getAllOperation().then() : ', this.operations);
        },
        (error) => {
          this.operations =
              (error.response &&
                  error.response.data &&
                  error.response.data.message) ||
              error.message ||
              error.toString();
        }
    );
  },
};
</script>