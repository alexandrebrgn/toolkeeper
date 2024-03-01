<template>
  <div class="container min-vh-100">
      <h3>Accueil</h3>
  </div>
</template>

<style>
</style>

<script>


import ToolService from "../services/tool.service.js";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Home",
  data() {
    return {
      content: "",
    };
  },
  mounted() {
    ToolService.getAllTool().then(
        (response) => {
          this.content = response.data;
        },
        (error) => {
          this.content =
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