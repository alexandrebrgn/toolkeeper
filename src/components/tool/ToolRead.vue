<template>
  <div class="container min-vh-100 bg-light">
    <header class="jumbotron">
      <p>{{tool}}</p>
    </header>
  </div>
</template>

<script>
import ToolService from "../../services/tool.service.js";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Tools",
  data() {
    return {
      tool: "",
    };
  },
  mounted() {
    ToolService.readTool(this.$route.params.id).then(
        (response) => {
          this.tool = response.data;
          console.log('ToolRead.vue - ToolService.getAllTool().then() : ', this.tool);
        },
        (error) => {
          this.tool = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
        }
    );
  },
};
</script>