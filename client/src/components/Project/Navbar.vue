<template>
	<v-toolbar v-bind:class="{ light: isLight, dark: !isLight }" class="navbar">
		<v-toolbar-items>
        <v-btn flat to="/">Home</v-btn>
        <v-btn flat to="/about">About</v-btn>
        <v-btn flat to="/TestView">Test View</v-btn>
    </v-toolbar-items>
    <v-spacer></v-spacer>
    <v-toolbar-items>
		<v-btn flat v-if="isLight" @click="toggleTheme()"><v-icon color="light-green darken-3">wb_sunny</v-icon></v-btn>
		<v-btn flat v-if="!isLight" @click="toggleTheme()"><v-icon color="white">star</v-icon></v-btn>
        <v-btn flat to="/SignInRegister"><v-icon style="padding-right: 6px;">perm_identity</v-icon>Sign in/Register</v-btn>
    </v-toolbar-items>
  </v-toolbar>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";

@Component
export default class Navbar extends Vue {
  isLight = true;
  toggleTheme() {
    this.isLight = !this.isLight;
    this.$emit("themeControl");
  }
}
</script>

<style scoped>
.v-btn--router {
  color: inherit;
}
</style>