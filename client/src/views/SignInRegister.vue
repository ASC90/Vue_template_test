<template>
	<v-container grid-list-md text-xs-center>
		<v-layout align-center justify-center row wrap>
			<v-flex xs10 sm8 md6 lg4 class="register-container">
				<v-tabs grow :slider-color="color">
					<v-tab>Sign in</v-tab>
					<v-tab>Register</v-tab>
					<v-tab-item id="sign-in">
						<!--sign-in-->
						<v-container>
						<v-form v-model="valid">
    					<v-text-field v-model="name" :rules="nameRules" :counter="10" label="Name" required></v-text-field>
    					<v-text-field v-model="email" :rules="emailRules" label="E-mail" required></v-text-field>
							<v-btn @click="signiIn()">Sign in</v-btn>
  					</v-form>
						</v-container>
					</v-tab-item>
					<v-tab-item id="register">
						<!--register
						<v-form v-model="valid">
    					<v-text-field v-model="name" :rules="nameRules" :counter="10" label="Name" required></v-text-field>
    					<v-text-field v-model="email" :rules="emailRules" label="E-mail" required></v-text-field>
  					</v-form>-->
					</v-tab-item>
				</v-tabs>
			</v-flex>
    </v-layout>
  </v-container>
</template>

<script lang="ts">
import { Component, Prop, Vue, Watch } from "vue-property-decorator";

@Component
export default class SignInRegister extends Vue {
  color = "lime accent-4";
  @Prop private theme!: boolean;
  @Watch("theme")
  onThemeChanged(val: string, oldVal: string) {
    console.log(val);
  }
  onInput() {
    console.log(this.theme);
    if (this.theme) {
      this.color = "black";
    } else {
      this.color = "lime accent-4";
    }
  }
  nameRules = [
    v => !!v || "Name is required",
    v => v.length <= 10 || "Name must be less than 10 characters"
  ];
  emailRules = [
    v => !!v || "E-mail is required",
    v => /.+@.+/.test(v) || "E-mail must be valid"
  ];
  valid = null;
  name = null;
  email = null;
  signiIn() {
    console.log(this.valid);
    console.log(this.name);
    console.log(this.email);
    // In watch method please
    if (this.theme == null || this.theme == undefined) {
      this.theme = false;
    }
    this.theme = !this.theme;
    console.log(this.theme);
    if (this.theme) {
      this.color = "black";
    } else {
      this.color = "lime accent-4";
    }
    // in watch methid plase/..
  }
}
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