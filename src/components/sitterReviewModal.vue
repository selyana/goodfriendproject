<template v-slot:top>
  <div>
    <DefaultButton :button-info="sitter.buttonInfo" @eventHandler="isReviewWindowOn = true"  />
    <v-dialog v-model="isReviewWindowOn" max-width="950px">
      <v-form ref="form" class="sitter-review-modal">
        <v-toolbar flat>
          <v-toolbar-title>
            Оцените работу ситтера
          </v-toolbar-title>
        </v-toolbar>
        <v-card-text>
            <v-textarea
              color="#18a8b5"
              v-model="review.textarea"
              outlined
              :label="textareaLabel"
              clearable
              :error-messages="errorMessages.textarea"
              @input="checkTextareaField"
            />
              <v-label>{{ radioLabel }}</v-label>
              <v-radio-group
                v-model="review.radio"
                row
                :error-messages="errorMessages.radio"
                @change="checkRadioField"
              >
                <v-radio
                  v-for="n in 5"
                  :key="n"
                  :label="`${n}`"
                  color="#18a8b5"
                  :value="n"
                />
              </v-radio-group>
            <v-text-field
              color="#18a8b5"
              v-model="review.textfield"
              class="mt-4"
              outlined
              clearable
              :label="textfieldLabel"
              :error-messages="errorMessages.textfield"
              @input="checkTextfieldField"
            />
            <DefaultButton :button-info="sitter.buttonInfo" @eventHandler="postReview" />
        </v-card-text>
      </v-form>
    </v-dialog>
        <v-dialog
      v-model="loading"
      persistent
      width="300"
    >
      <v-card
        color="#18a8b5"
        dark
      >
        <v-card-text class="pt-2">
          Пожалуйста, подождите
          <v-progress-linear
            indeterminate
            color="white"
            class="mt-2"
          ></v-progress-linear>
        </v-card-text>
      </v-card>
    </v-dialog>
    <v-dialog
      v-model="dialog"
      width="500"
    >
      <v-card>
        <v-card-title class="text-h5">
          Ваш отзыв отправлен
        </v-card-title>

        <v-card-text>
          Спасибо!
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>

<script>
import DefaultButton from '../components/defaultButton'

export default {
  components: { DefaultButton },
  props: {
    sitter: {
      type: Object,
      required: true
    }
  },
  data () {
    return {
      textareaLabel: 'Отзыв о работе',
      textfieldLabel: 'Ваше имя',
      radioLabel: 'Оцените работу ситтера',
      loading: false,
      dialog: false,
      isReviewWindowOn: false,
      review: {
        textarea: '',
        radio: null,
        textfield: ''
      },
      errorMessages: {
        textarea: '',
        textfield: '',
        radio: ''
      }
    }
  },

  methods: {
    postReview () {
      if (!this.validate()) {
        return false
      }
      this.loading = true
      setTimeout(() => (this.loading = false, this.isReviewWindowOn = false,this.dialog = true), 2000)
    },

    checkTextareaField () {
          if (this.review.textarea === '' || this.review.textarea === null) {
            this.errorMessages.textarea = "Поле должно быть заполнено"
            return false
          } else {
            this.errorMessages.textarea = ''
          }
      return true
    },

    checkTextfieldField () {
          if (this.review.textfield === '' || this.review.textfield === null) {
            this.errorMessages.textfield = "Поле должно быть заполнено"
            return false
          } else {
            this.errorMessages.textfield = ''
          }
      return true
    },

    checkRadioField () {
          if (this.review.radio === '' || this.review.radio === null) {
            this.errorMessages.radio = "Поставьте оценку"
            return false
          } else {
            this.errorMessages.radio = ''
          }
      return true
    },

    validate () {
      return this.checkTextareaField() && this.checkRadioField() && this.checkTextfieldField()
    }
  }
}
</script>