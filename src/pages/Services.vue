<template>
  <v-container>
    <v-row class="reviewsHeader">
      <v-col lg="12" md="3" sm="8" xs="12" class="order-xs-2">
        <h3 class="text-md-center pa-2 display-1 font-weight-bold">
          НАШИ УСЛУГИ
        </h3>
      </v-col>
      <v-col
        lg="4"
        md="4"
        sm="4"
        xs="12"
        align-self="center"
        class="order-xs-1 justify-content-center"
      >
      </v-col>
    </v-row>
    <v-row>
      <v-col
        v-for="servis in services"
        :key="servis.id"
        :lg="4"
        :md="6"
        :sm="12"
      >
        <ServisItem :servis="servis" />
      </v-col>
    </v-row>
    <!--v-row class="justify-content-center pa-10">
      <ServicesFormModal />
    </v-row-->
  </v-container>
</template>

<script>
//import ServicesFormModal from "../components/ServicesFormModal.vue";
import ServisItem from "../components/ServisItem.vue";
import { mapState } from "vuex";
export default {
  name: "Services",
  components: { ServisItem },
  computed: {
    ...mapState({
      services: (state) => state.services.services,
    }),
  },
  methods: {},
};
</script>

<style>
.reviewsHeader {
  align-items: center;
}
.reviewsHeader_img {
  border-radius: 50%;
  height: 200px;
  margin: 0 auto;
  display: flex;
}
.reviewsFooter {
  align-self: center;
}
@media (max-width: 599px) {
  .reviewsHeader .order-xs-1 {
    order: 1 !important;
  }
  .reviewsHeader .order-xs-2 {
    order: 2 !important;
  }
  .justify-content-center {
    justify-content: center !important;
  }
}
</style>
