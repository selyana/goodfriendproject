<template>
  <div class="unit-info-list">
    <i>
      <v-icon>
        {{ info.icon }}
      </v-icon>
    </i>
    {{ info.text }}: <strong> {{ info.value }} </strong>
  </div>
</template>

<script>
export default {
  props: {
    info: {
      type: Object,
      required: true
    }
  }
}
</script>
