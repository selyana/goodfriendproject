<template>
  <v-container class="mt-n2">
    <v-row class="sitters-list">
      <v-col
        v-for="(item, index) in sitters"
        :key="index"
      >
        <DefaultVertCard :item="item" :nav-href="navHref" />
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import DefaultVertCard from './defaultVertCard'
export default {
  components: { DefaultVertCard },
  props: {
    sitters: {
      type: Array,
      default: () => []
    }
  },
  data () {
    return {
      navHref: {
        href1: 'find-sitter'
      }
    }
  }
}
</script>

