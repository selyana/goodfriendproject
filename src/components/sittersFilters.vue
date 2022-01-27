<template>
  <aside class="aside">
    <form class="filter">
      <div class="filter__head">
        <div class="filter__title">
          {{ header }}
        </div>
        <span class="filter__reboot" @click="removeFilters" />
      </div>
      <div v-for="(filter, index) in filters" :key="index" class="filter-item">
      <div class="filter-item__head">
        <div>
          {{ filter.title }}
        </div>
        <div class="filter-item__icon" @click="removeFilter(filter)" />
      </div>
        <FilterCheckbox
          :filter="filter"
          @updateOptions="updateOptions"
          :options-selected="optionsSelected"
        />
      </div>
      <div class="filter__foot">
        <DefaultButton
          :button-info="buttonInfo"
          @eventHandler="getSittersList"
        />
      </div>
    </form>
  </aside>
</template>

<script>
import FilterCheckbox from "./filterCheckbox";
import DefaultButton from "./defaultButton";

export default {
  components: { FilterCheckbox, DefaultButton },
  data() {
    return {
      optionsSelected: {},
      header: "Фильтры",
      buttonInfo: {
        text: "Искать",
      },
      filters: [
        {
          title: "Район города",
          filterName: "cityAreas",
          options: [
            { title: "Север" },
            { title: "Юг" },
            { title: "Восток" },
            { title: "Запад" },
            { title: "Центр" },
          ],
        },
        {
          title: "Специализация",
          filterName: "specialties",
          options: [
            { title: "Кошки" },
            { title: "Собаки" },
            { title: "Экзотические животные" },
          ],
        },
      ],
    };
  },
  mounted() {
    this.filters.forEach((filter) => {
      this.$set(this.optionsSelected, filter.filterName, []);
    });
  },
  methods: {
    getSittersList () {
      this.$emit('filterList', this.optionsSelected)
    },
    updateOptions(localOptionsSelected, filterName) {
      this.$set(this.optionsSelected, filterName, localOptionsSelected);
    },
    removeFilters() {
      this.filters.forEach((filter) => {
      this.$set(this.optionsSelected, filter.filterName, []);
    });
    },
    removeFilter(filter) {
      this.$set(this.optionsSelected, filter.filterName, []);
    }
  }
};
</script>
