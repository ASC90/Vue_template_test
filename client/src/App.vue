<template>
  <div id="app" v-bind:class="{ light: isLight, dark: !isLight }">
    <!--<div id="nav">
      <router-link to="/">Home</router-link> |
      <router-link to="/about">About</router-link>
    </div>-->
    <Navbar v-on:themeControl="isLight = !isLight"/>
    <router-view theme="isLight"/>
  </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
import Navbar from "@/components/Project/Navbar.vue";
@Component({
  components: {
    Navbar
  },
  template: require("@/style.css")
})
export default class App extends Vue {
  isLight = true;
}
</script>
