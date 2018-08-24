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
import { Component, Prop, Vue, Watch } from "vue-property-decorator";
import Navbar from "@/components/Project/Navbar.vue";
import { mapState } from "vuex";

@Component({
  components: {
    Navbar
  },
  template: require("@/style.css"),
  computed: mapState(["globalIsLight"])
})
export default class App extends Vue {
  isLight = true;
  @Watch("isLight")
  onIsLightChanged(value: boolean, oldValue: boolean) {
    //console.log(value);
    this.$store.commit("changeTheme", this.isLight);
    //globalIsLight = this.isLight;
  }
}
</script>
