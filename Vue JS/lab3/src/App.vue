<template>
  <navbar v-if="!$route.meta.hideNavbar"/>
  <div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
    <router-view></router-view>
  </div>
</template>

<script>
import navbar from './components/partials/navbar.vue'

export default {
  name: 'App',
  components: {
    navbar

  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
.card-text{
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
  }
  .text-cafe{
      color: #c2a085;
  }
  .text-style{
      font-family: 'Brush Script MT', cursive;
      font-size: 2.3rem;
  }
  .border-cafe{
      border: solid thin #c2a085;
  }
</style>
