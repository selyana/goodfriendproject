<template>
  <v-card class="mx-auto" max-width="400" height="600">
    <v-list-item-content class="text-center font-weight-bold mb-3">
      <v-row justify="center" class="text-center font-weight-bold mb-3">
        <v-img
          alt=""
          :src="require(`../assets/${servis.avatar}`)"
          max-width="400"
          max-height="300"
        ></v-img>
      </v-row>
      <v-row justify="center" class="text-center font-weight-bold mb-3">
        <H2>{{ servis.name }}</H2>
      </v-row>
      <v-row justify="center" class="text-center font-weight-bold mb-3">
        <v-card-text class="text-center text-h6">
          {{ servis.servis }}
        </v-card-text>
      </v-row>
    </v-list-item-content>

    <v-card-actions height="100%" class="justify-center">
      <!--v-btn class="card-outter"><ServicesFormModal :servis="servis" :serviceForm="servisModal"/></v-btn-->
      <v-btn class="card-outter"><ServicesFormModal :servis="servis" /></v-btn>
    </v-card-actions>

    <!--div class="mr-1" color="#778899">
     <ServicesFormModal />
     </div-->
  </v-card>
</template>

<script>
import ServicesFormModal from "../components/ServicesFormModal.vue";
import { getRandomAvatar } from "../lib/randomAvatar";

export default {
  name: "ServisItem",
  components: { ServicesFormModal },
  props: {
    servis: {
      type: Object,
      required: true,
    },
  },

  computed: {
    avatar() {
      return getRandomAvatar();
    },
  },

  mounted() {
    //this.servisModal = this.servis
    //this.servis.id = 1
    console.log("ServisItem "+this.servis.id)
    //this.servisModal=this.servis.id
    //this.servisModal=this.servis.id
  },


  methods: {},
};
</script>

<style>
</style>
