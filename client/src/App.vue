<template>
  <div id="app" v-bind:class="{ light: isLight, dark: !isLight }">
    <!--<div id="nav">
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </div>-->
    <Navbar v-on:themeControl="isLight = !isLight"/>
    <router-view/>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import Navbar from "@/components/Project/Navbar.vue";
@Component({
  components: {
    Navbar
  }
})
export default class App extends Vue {
  isLight = true;
}
</script>


<style>
@import url("https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=latin-ext");
#app {
  font-family: "Raleway", sans-serif;
}
.light {
  color: black;
  background-color: white;
}
.dark {
  color: white;
  background-color: #3a3a3a;
}
/*#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}
#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}*/
</style>
