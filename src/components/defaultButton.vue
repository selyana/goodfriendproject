<template>
  <a class="btn" @click="eventHandler"> {{ buttonInfo.text }} </a>
</template>

<script>
export default {
  props: {
    buttonInfo: {
      type: Object,
      default: () => {}
    }
  },
  methods: {
    eventHandler () {
      this.$emit('eventHandler')
    }
  }

}
</script>
