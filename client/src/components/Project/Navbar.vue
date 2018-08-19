<template>
 <v-toolbar color="lime">
    <v-toolbar-items>
        <v-btn color="lime darken-4" flat to="/">Home</v-btn>
        <v-btn color="lime darken-4" flat to="/about">About</v-btn>
        <v-btn color="lime darken-4" flat>Link Three</v-btn>
    </v-toolbar-items>
  </v-toolbar>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";

@Component
export default class Navbar extends Vue {}
</script>

<style scoped>
    /*  
    .router-link.router-link-exact-active.router-link-active {
        box-shadow: none;
    }
    .v-btn:not(.v-btn--depressed):not(.v-btn--flat) {
        box-shadow: none;
    }
    .v-btn.v-btn--flat::before {
        width: inherit;
        height: inherit;
        background-color: inherit;
    }
    .v-btn {
        background-color: aquamarine;
    }
    */
    .v-btn--router {
        color: black;
    }
</style>