# Vue_template_test

Vue template for typescript class-style app like angular

## Vue with typescript using @vue/cli

Install in your local device Node.js

Then run npm i -g @vue/cli to have the cli of vue

## Component inside a component
To make a component inside an other component:
- Create file .vue extension of the new component and add this (for example):

<template>
</template>
<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';
@Component
export default class TestComponent extends Vue {}
</script>
<style scoped>
</style>


- Then call the component inside the other component:
    - 1.- import: import TestComponent from '@/components/TestComponent.vue';
    - 2.- Add to the decorator: @Component({
                                    components: {
                                        TestComponent,
                                    }
                                })
    - 3.- Then add the custom tag inside the component "<TestComponent/>"