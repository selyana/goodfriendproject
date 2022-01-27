<template>
  <v-list flat>    
    <div
      v-for="(option, index) in filter.options"
      :key="index"
      class="checkbox">
      <v-checkbox      
        v-model="localOptionsSelected"
        :label="option.title"
        :value="option.title"
      />
    </div>
  </v-list>
</template>

<script>

export default {
  props: {
    filter: {
      type: Object,
      default: () => {}
    },
    optionsSelected: {
      type: Object,
      default: () => {}
    }
  },
  data () {
    return {
      localOptionsSelected: []
    }
  },

    computed: {
    remoteOptionsSelected () {
      return this.optionsSelected[this.filter.filterName]
    }
  },

  watch: {
    localOptionsSelected (localOptionsSelected) {
      if (this.remoteOptionsSelected.length !== localOptionsSelected.length) {
        this.$emit('updateOptions', localOptionsSelected, this.filter.filterName)
      }
    },

    remoteOptionsSelected () {
      if (this.optionsSelected[this.filter.filterName].length === 0) {
        this.localOptionsSelected = []
      }
    }
  }  
}
</script>
