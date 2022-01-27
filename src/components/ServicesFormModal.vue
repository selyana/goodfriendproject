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
          Получить услугу
        </v-btn>
      </template>
      <ServicesForm serviseForm="serviceModal" :servis="servis"
        v-on:close-dialog="closeDialog"
      />
    </v-dialog>
  </v-row>
</template>

<script>
import ServicesForm from "../components/ServicesForm.vue";
export default {
  name: "ServicesFormModal",

  components: { ServicesForm },
 
  data() {
    return {
      serviceModal: 0,
      dialog: false
    }
  },

props: {
    servis: {
      type: Object,
      required: true,
    },
  },

  mounted() {
    this.servisModal = 1
    //this.servis.id = 1
    console.log("ServicesFormModal "+this.servis.id)
    //this.servisModal=this.servis.id
    //this.servisModal=this.servis.id
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
