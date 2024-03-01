<template>
  <div class="container min-vh-100">
    <header class="jumbotron">

      <router-link to="/categoryAdd">
        <button type="button" class="btn btn-primary">
          <p class="button-text"><span class="icon-plus">+ </span>Nouvelle catégorie d'équipement</p>
        </button>
      </router-link>

      <div class="category-container" v-for="category in categories" :key="category.id">
          <div class="category">
            <router-link :to="{name: 'tools'}">
            <p>{{category.name}}</p>
            </router-link>
          </div>
      </div>
    </header>
  </div>
</template>

<style>
.category{
  display: flex;
  height: auto;
  width: auto;
  //border: 1px solid red;

}
.category-container{
  display: flex;
  flex-direction: column;
}
</style>

<script>
import CategoryService from "../../services/category.service.js";

export default {
  // eslint-disable-next-line vue/multi-word-component-names
  name: "Categories",
  data() {
    return {
      categories: "",
    };
  },
  mounted() {
    CategoryService.getAllCategory().then(
        (response) => {
          this.categories = response.data;
          console.log('Category.vue - CategoryService.getAllCategory().then() : ', this.categories);
        },
        (error) => {
          this.categories = (error.response && error.response.data && error.response.data.message) || error.message || error.toString();
        }
    );
  },
};
</script>