<template>
  <div v-if="cardInfo !== null && index < limit" class="review__card">
    <div class="review__card__header">
      <div class="avatar-name">
        <img class="review__card__photo" :src="require(`../assets/${cardInfo.avatar}`)" alt="avatar">
        <div>
          <div class="review__card__author">
            <span>{{ cardInfo.name }}</span>
          </div>
          <div class="review__card__date">
            {{ cardInfo.date }}
          </div>
        </div>
      </div>
      <div>
        <Rating :rating-info="cardInfo.rating" />
      </div>
    </div>
    <div class="review__card__text">
      <span v-if="!isFullTextShown">{{ shortenText(cardInfo.text) }}</span>
      <span v-if="isFullTextShown">{{ cardInfo.text }}</span>
      <a v-if="cardInfo.text.length > 250 && !isFullTextShown" @click="isFullTextShown = true">Читать отзыв полностью</a>
    </div>
      <div class="review__card__footer">
          <div class="mr-3">
          Отзыв полезен?
          </div>
        <button class="mr-3" @click="upvote">
          <i>
            <v-icon v-if="!upvoted">
              mdi-thumb-up-outline
            </v-icon>
            <v-icon v-if="upvoted">
              mdi-thumb-up
            </v-icon>
          </i>
          {{ upVotes }}
        </button>
        <button @click="downvote">
          <i>
            <v-icon v-if="!downvoted">
              mdi-thumb-down-outline
            </v-icon>
            <v-icon v-if="downvoted">
              mdi-thumb-down
            </v-icon>
          </i>
          {{ downVotes }}
        </button>
      </div>
    </div>
</template>

<script>
import Rating from '../components/rating'

export default {
  components: { Rating },
  props: {
    cardInfo: {
      type: Object,
      default: () => {}
    },
    cardText: {
      type: Object,
      default: () => {}
    },
    limit: {
      type: Number,
      required: true
    },
    index: {
      type: Number,
      required: true
    }
  },
  data () {
    return {
      shortText: '',
      isFullTextShown: false,
      upvoted: this.cardInfo.upvoted,
      downvoted: this.cardInfo.downvoted
    }
  },
  computed: {
    upVotes () {
      if (this.upvoted) {
        return this.cardInfo.thumbsUp + 1
      } else {
        return this.cardInfo.thumbsUp
      }
    },
    downVotes () {
      if (this.downvoted) {
        return this.cardInfo.thumbsDown + 1
      } else {
        return this.cardInfo.thumbsDown
      }
    }
  },
  methods: {
    upvote () {
      this.upvoted = !this.upvoted
      this.downvoted = false
      this.postUpVote()
    },
    downvote () {
      this.downvoted = !this.downvoted
      this.upvoted = false
      this.postDownVote()
    },
    shortenText (text) {
      return text.substring(0, 250)
    },
    postUpVote () {
    },
    postDownVote () {
    }
  }
}
</script>
