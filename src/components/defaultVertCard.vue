<template>
  <article class="card">
      <img
        :src="require(`../assets/${item.image}`)"
        :alt="item.name"
        class="card-img"
        width="255"
        height="255"
      >
    <div class="card-description">
      <a :href="`/${navHref.href1}/` + item.id">
        <h3
          class="card-name"
          :title="item.name"
        >
          {{ item.name }}
        </h3>
      </a>
      <div class="mb-2">
        <div v-for="(item, index) in item.info" :key="index">
          <InfoIcon :info="item" />
        </div>
      </div>
      <div class="card-details">
        <div class="ml-n2">
          <Rating class="mb-2" :rating-info="item.rating" />
        </div>
        <DefaultButton :button-info="item.buttonInfo" :href="`/${navHref.href1}/` + item.id" />
      </div>
    </div>
  </article>
</template>

<script>
import InfoIcon from '../components/infoIcon'
import Rating from '../components/rating'
import DefaultButton from '../components/defaultButton'

export default {
  components: { InfoIcon, Rating, DefaultButton },
  props: {
    item: {
      type: Object,
      required: true
    },
    navHref: {
      type: Object,
      default: () => {}
    }
  }
}
</script>
