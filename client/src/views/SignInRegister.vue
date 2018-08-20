<template>
	<v-container grid-list-md text-xs-center>
		<v-layout align-center justify-center row wrap>
			<v-flex xs10 sm8 md6 lg4>
				<v-tabs grow slider-color="lime accent-4">
				<v-tab>Sign in</v-tab>
				<v-tab>Register</v-tab>
				<v-tab-item>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum voluptate a facilis numquam dolorum rem, consequatur sit odit porro hic saepe suscipit nostrum neque illo ipsam explicabo adipisci enim. Nulla.</v-tab-item>
				<v-tab-item>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum voluptate a facilis numquam dolorum rem, consequatur sit odit porro hic saepe suscipit nostrum neque illo ipsam explicabo adipisci enim. Nulla.</v-tab-item>
			</v-tabs>
			</v-flex>
    	</v-layout>
  	</v-container>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";

@Component
export default class SignInRegister extends Vue {}
</script>

<style scoped>
.flex {
  margin-top: 30px;
  padding: 12px;
}
.v-tabs__content {
  padding-top: 6px;
}
</style>