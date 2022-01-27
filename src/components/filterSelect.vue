<template>
  <v-select
    v-model="item"
    :items="filters"
    item-text="name"
    item-value="value"
    outlined
    label="Отфильтровать"
    class="filter-select"
    color="#18a8b5"
  />
</template>

<script>
export default {
  props: {
    filters: {
      type: Array,
      required: true
    }
  },
  data () {
    return {
      item: []
    }
  },
  watch: {
    item (item) {
      this.$emit('changeFilter', item)
    }
  }
}
</script>
