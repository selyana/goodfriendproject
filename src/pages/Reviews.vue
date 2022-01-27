<template>
  <v-container>
    <v-row class="reviewsHeader">
      <v-col
        lg="8"
        md="8"
        sm="8"
        xs="12"
        class="order-xs-2"
      >
        <h3 class="display-1 font-weight-bold mb-3">
          ОТЗЫВЫ О&nbsp;&laquo;ДОБРЫЙ&nbsp;ДРУГ&raquo;
        </h3>
        <p class="subheading font-weight-regular">
          Только отзывы от&nbsp;наших настоящих клиентов.
        </p>
        <ReviewsFormModal class="mt-3 ml-1" />
      </v-col>
      <v-col
        lg="4"
        md="4"
        sm="4"
        xs="12"
        align-self="center"
        class="order-xs-1 justify-content-center"
      >
        <img
          :src="require('../assets/reviews.jpg')"
          class="reviewsHeader_img"
        />
      </v-col>
    </v-row>
    <v-row>
      <v-col
        v-for="review in reviews"
        :key="review.id"
        :lg="4"
        :md="6"
        :sm="12"
      >
        <ReviewItem :review="review" />
      </v-col>
    </v-row>
    <v-row class="mt-4">
      <v-col
        lg="8"
        md="8"
        sm="8"
        xs="12"
      >
        <h3 class="display-1 font-weight-bold mb-3">
          ОСТАВЬТЕ СВОЙ ОТЗЫВ
        </h3>
        <p class="subheading font-weight-regular">
          Через некоторое время после отправки он&nbsp;появится на&nbsp;этой странице
        </p>
      </v-col>
      <v-col
        lg="4"
        md="4"
        sm="8"
        xs="12"
        class="reviewsFooter"
      >
        <ReviewsFormModal />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import ReviewsFormModal from '../components/ReviewsFormModal.vue';
import ReviewItem from "../components/ReviewItem.vue";
import { mapState } from 'vuex';
export default {
  name: 'Reviews',
  components: { ReviewsFormModal, ReviewItem },
  computed: {
    ...mapState({
      reviews: state => state.reviews.reviews,
    }),
  },
  // created() {
  //   this.$store.dispatch("fetchDataFromApi", { self: this })       
  // },
  methods: {
  }
}
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
