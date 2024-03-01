<template>
  <div class="container-sm min-vh-100">
    <div class="jumbotron">
      <router-link to="/toolAdd">
        <button type="button" class="btn btn-primary">
          <p class="button-text"><span class="icon-plus">+ </span>Nouvel équipement</p>
        </button>
      </router-link>
      <button class="btn btn-primary">
        <a :onclick="testUpdate" style="color: white; text-decoration: none">Test</a>
      </button>

      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Bordered Table</h3>
        </div>

        <div class="card-body">
          <table class="table table-bordered">
            <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th class="sorting sorting_asc">Nom de l'équipement<i class="fas fa-bullhorn"></i></th>
              <th>Localisation</th>
              <th style="width: 40px">Label</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="tool in tools" :key="tool.id">
              <td>{{tool.id}}</td>
              <td>{{tool.number}}{{tool.category.name}}</td>
              <td>{{tool.localisation}}</td>
              <td><router-link :to="{name:'tool', params: {id: tool.id,}}"><font-awesome-icon icon="eye" /></router-link></td>
            </tr>
            </tbody>
          </table>
        </div>

        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">»</a></li>
          </ul>
        </div>
      </div>

<!--      <table class="table">-->
<!--        <thead>-->
<!--          <tr class="d-flex">-->
<!--            <th class="col-1">#</th>-->
<!--            <th class="col-4">Nom</th>-->
<!--            <th class="col-4">Numéro de série</th>-->
<!--            <th class="col-2">Catégorie</th>-->
<!--            <th class="col-1">Voir</th>-->
<!--          </tr>-->
<!--        </thead>-->
<!--        <tbody v-for="tool in tools" :key="tool.id">-->
<!--          <tr class="d-flex">-->
<!--            <th scope="row" class="col-1">{{tool.id}}</th>-->
<!--            <td class="col-4">-->
<!--              <ul>-->
<!--                <li>-->
<!--                  <i class="fas fa-bullhorn"></i>-->
<!--                </li>-->
<!--                <li>-->
<!--                  <input v-if="tool.edit"-->
<!--                         v-model="tool.number"-->
<!--                         @blur="tool.edit=false; $emit('update')"-->
<!--                         @keyup.enter="tool.edit=false; this.testUpdate(tool.number, tool.id)"-->
<!--                         type="text">-->
<!--                  <div v-else><label @click="tool.edit=true;">{{tool.number}}</label></div>-->
<!--                </li>-->
<!--              </ul>-->
<!--            </td>-->
<!--            <td class="col-4">{{tool.serialId}}</td>-->
<!--            <td class="col-2">{{tool.category.name}}</td>-->
<!--            <td class="col-1">-->
<!--              <router-link :to="{name:'tool', params: {id: tool.id,}}"><font-awesome-icon icon="eye" /></router-link>-->
<!--              <font-awesome-icon icon="pencil" />-->
<!--            </td>-->
<!--          </tr>-->
<!--        </tbody>-->
<!--      </table>-->
    </div>
  </div>
</template>

<script setup>
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
</script>

<script>
import ToolService from "../../services/tool.service.js";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Tools",
  data() {
    return {
      tools: "",
    };
  },
  methods: {
    testUpdate(number, id) {
      ToolService.updateTool(number, id).then(
          (response) => {
            console.log('Tool.vue - ToolService.update().then() : ', response);
            this.$router.push('/operation')
          },
          (error) => {
            this.tools = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
          }
      );
      console.log('ToolAdd.vue - ToolService.addTool()')
    },
  },
  mounted() {
    ToolService.getAllTool().then(
        (response) => {
          this.tools = response.data;
          console.log('Tool.vue - ToolService.getAllTool().then() : ', this.tools);
        },
        (error) => {
          this.tools = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
        }
    );
  },
};
</script>

