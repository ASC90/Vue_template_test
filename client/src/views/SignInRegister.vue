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
    					<v-text-field v-model="fields.name" :rules="hasSubmit ? nameRules : defaultRules" :counter="10" label="Name" required clearable></v-text-field>
    					<v-text-field v-model="fields.email" :rules="hasSubmit ? emailRules : defaultRules" label="E-mail" required clearable></v-text-field>
							<v-btn @click="signIn()">Sign in</v-btn>
							<DialogInvalidFormulary v-bind:dialog="dialog" v-on:closeDialog="dialog = false"/>
  					</v-form>
						</v-container>
					</v-tab-item>
					<v-tab-item id="register">
						To do
					</v-tab-item>
				</v-tabs>
			</v-flex>
    </v-layout>
  </v-container>
</template>

<script lang="ts">
import { Component, Vue, Watch } from "vue-property-decorator";
import DialogInvalidFormulary from "@/components/Project/DialogInvalidFormulary.vue";
import App from "@/App.vue";
import { mapState } from "vuex";

@Component({
  computed: mapState(["globalIsLight"]),
  components: {
    DialogInvalidFormulary
  }
})
export default class SignInRegister extends Vue {
  private dialog = false;
  private color = "";
  private isLight = this.$store.state.globalIsLight;
  private valid = null;
  private fields = {
    name: "",
    email: ""
  };
  private hasSubmit = false;
  private defaultRules = [];
  private nameRules = [
    v => !!v || "Name is required",
    v => v.length <= 10 || "Name must be less than 10 characters"
  ];
  private emailRules = [
    v => !!v || "E-mail is required",
    v => /.+@.+/.test(v) || "E-mail must be valid"
  ];
  created() {
    this.setColor();
  }
  @Watch("globalIsLight")
  onGlobalIsLightChanged(value: boolean, oldValue: boolean) {
    this.isLight = value;
    this.setColor();
  }
  @Watch("fields.name")
  onFieldsNameChanged(value, oldValue) {
    if (value == null) {
      this.fields.name = "";
    }
  }
  @Watch("fields.email")
  onFieldsEmailChanged(value, oldValue) {
    if (value == null) {
      this.fields.email = "";
    }
  }
  setColor() {
    if (this.isLight) {
      this.color = "blue-grey darken-3";
    } else if (!this.isLight) {
      this.color = "lime accent-4";
    }
  }
  signIn() {
    this.hasSubmit = true;
    if (this.hasSubmit && this.valid) {
      // Post
    } else if (this.hasSubmit && !this.valid) {
      this.dialog = true;
    }
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