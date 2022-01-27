<template>
  <v-row>
    <v-dialog
      v-model="dialog"
      persistent
      max-width="600px"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="#18a8b5"
          dark
          v-bind="attrs"
          v-on="on"
        >
          Оставить отзыв
        </v-btn>
      </template>
      <ReviewsForm
        v-on:close-dialog="closeDialog"
      />
    </v-dialog>
  </v-row>
</template>

<script>
import ReviewsForm from "../components/ReviewsForm.vue";
export default {
  name: "ReviewsFormModal",

  components: { ReviewsForm },

  data() {
    return {
      dialog: false
    }
  },
  methods: {
    closeDialog() {
      this.dialog = false;
    },
    sendReview(formData) {
      this.$emit('send-review', formData);
    }
  }
}
</script>
