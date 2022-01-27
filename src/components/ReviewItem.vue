<template>
  <v-card
    class="mx-auto"
    color="#6de8e6"
    dark
    max-width="400"
  >

    <v-card-text class="text-h5 font-weight-bold review-card">
      {{review.review}}
    </v-card-text>

    <v-card-actions>
      <v-list-item class="grow">
        <v-list-item-avatar>
          <v-img
            class="elevation-6"
            alt=""
            :src="review.avatar ? review.avatar : avatar"
          ></v-img>
        </v-list-item-avatar>

        <v-list-item-content>
          <v-list-item-title class="review-name">{{review.name}}</v-list-item-title>
          <v-spacer></v-spacer>
          <v-rating
            :value="review.grade"
            background-color="orange lighten-3"
            color="orange"
            size="24"
            readonly
          />
        </v-list-item-content>
      </v-list-item>
    </v-card-actions>
  </v-card>
</template>

<script>
import { getRandomAvatar } from '../lib/randomAvatar'
export default {
  name: "ReviewItem",

  props: {
    review: Object
  },

  computed: {
    avatar() {
      return getRandomAvatar();
    }
  },

  methods: {

  }

}
</script>

<style>

</style>
