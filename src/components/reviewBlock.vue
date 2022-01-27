<template>
  <div class="section">
    <div class="container container-comments">
      <div class="listing--context-reviews">
        <div class="listing__flex">
          <div class="listing__content--comments">
            <div class="listing__list__header">
              <div class="row-comments">
                <div class="comments-title">
                  <h3>Отзывы о работе:</h3> 
                </div>
                <div>
                  <FilterSelect :filters="filters" @changeFilter="changeFilter" />
                </div>
              </div>
            </div>
            <div class="review-cards-btn">
              <div
                v-for="(review, index) in sortedReviews"
                :key="index"
              >
                <ReviewCard :card-info="review" :limit="limitBy" :index="index" />
              </div>
              <a
                v-if="unit.reviews.length > defaultLimit"
                class="btn mt-4 reviewBtn"
                @click="simpleToggle(defaultLimit, unit.reviews.length)"
              >
                {{ limitBy === defaultLimit ? "Показать все отзывы" : "Скрыть" }}
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import ReviewCard from '../components/reviewCard'
import FilterSelect from '../components/filterSelect'

export default {
  components: { FilterSelect, ReviewCard },
  props: {
    unit: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      filters: ['Сперва положительные', 'Сперва отрицательные'],
      defaultLimit: 3,
      limitBy: 3,
      sortedReviews: this.unit.reviews
    }
  },
  methods: {
    changeFilter (filter) {
      if (filter === 'Сперва положительные') {
        this.sortedReviews = this.sortedReviewsThumbsUp()
      }
      if (filter === 'Сперва отрицательные') {
        this.sortedReviews = this.sortedReviewsThumbsDown()
      }
    },
    simpleToggle (defaultLimit, filtersLength) {
      this.limitBy =
        this.limitBy === defaultLimit ? filtersLength : defaultLimit
    },
    sortedReviewsThumbsUp () {
      return JSON.parse(JSON.stringify(this.unit.reviews)).sort(function (a, b) {
        return b.thumbsUp - a.thumbsUp
      })
    },
    sortedReviewsThumbsDown () {
      return JSON.parse(JSON.stringify(this.unit.reviews)).sort(function (a, b) {
        return b.thumbsDown - a.thumbsDown
      })
    }

  }
}
</script>
