<template>
    <div>
        <p>TestComponent works!!</p>
        <input type="text">
    </div>
</template>

<script lang="ts">
import { Component, Prop, Vue } from 'vue-property-decorator';

@Component
export default class TestComponent extends Vue {}
</script>

<style scoped>
    input[type="text"] {
        padding: 4px 8px;
        border-radius: 4px;
        border: 1px solid darkgray;
    }
</style>


