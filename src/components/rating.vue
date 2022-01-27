<template>
  <v-rating
    :value="ratingInfo"
    background-color="orange lighten-3"
    color="orange"
    size="24"
    readonly
  />
</template>

<script>
export default {
  props: {
    ratingInfo: {
      type: Number,
      default: () => {}
    }
  }

}
</script>
