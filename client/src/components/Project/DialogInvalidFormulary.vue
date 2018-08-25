<template>
    <v-dialog
      v-model="dialog"
      width="500"
      persistent 
    >
      <v-card>
        <v-card-title
          class="headline"
          primary-title
        >
          Invalid Formulary
        </v-card-title>
        <v-card-text>
            The Formulary is invalid. Please try to fill the fields correctly. 
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            flat
            @click="onCloseDialog()"
          >
            Ok
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
</template>

<script lang="ts">
import { Component, Prop, Vue } from "vue-property-decorator";
@Component
export default class DialogInvalidFormulary extends Vue {
  @Prop() private dialog!: boolean;
  onCloseDialog() {
    console.log(this.dialog);
    this.$emit("closeDialog");
  }
}
</script>

