<template>
  <v-card>
    <v-toolbar dark color="#6fe8dc">
      <v-spacer></v-spacer>
      <v-btn icon dark @click="closeDialog">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-toolbar>
    <v-card-title>
      <span class="text-h5">Оставить отзыв</span>
    </v-card-title>
    <v-card-text>
      <v-form ref="form" v-model="valid" lazy-validation>
        <v-container>
          <v-row>
            <v-col cols="12">
              <v-text-field
                label="Ваше имя*"
                outlined
                required
                v-model="name"
                :rules="nameRules"
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                label="Ваш email*"
                outlined
                required
                v-model="email"
                :rules="emailRules"
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-text-field
                label="Ваш телефон*"
                outlined
                required
                v-model="phone"
                :rules="phoneRules"
              ></v-text-field>
            </v-col>
            <v-col cols="12">
              <v-textarea
                label="Ваш отзыв*"
                outlined
                required
                v-model="review"
                :rules="reviewRules"
                class="mb-4"
              ></v-textarea>
            </v-col>
            <v-col cols="12">
              <v-slider
                color="#6fe8dc"
                v-model="grade"
                :thumb-size="34"
                thumb-label="always"
                :tick-labels="ticksLabels"
                :min="0"
                :max="5"
                step="1"
                ticks="always"
                tick-size="4"
              >
                <template v-slot:thumb-label="{ value }">
                  <span class="thumb">{{ satisfactionEmojis[value] }}</span>
                </template>
              </v-slider>
            </v-col>
          </v-row>
        </v-container>
        <small>Поля отмеченные * обязательные для заполнения</small>
      </v-form>
    </v-card-text>
    <v-card-actions>
      <v-spacer></v-spacer>
      <v-btn color="#1fb5b8" text @click="sendReview"
        >Отправить отзыв</v-btn
      >
    </v-card-actions>
  </v-card>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "ReviewsForm",
  data() {
    return {
      valid: true,
      name: "",
      email: "",
      phone: "",
      review: "",
      grade: "",
      satisfactionEmojis: ["🙁", "😐", "🙂", "😊", "😁", "😍"],
      ticksLabels: ["0", "1", "2", "3", "4", "5"],
      nameRules: [(v) => !!v || "Имя обязательное поле"],
      emailRules: [
        (v) => !!v || "Email обязательное поле",
        (v) => /.+@.+\..+/.test(v) || "Email должен быть валидным",
      ],
      phoneRules: [(v) => !!v || "Телефон обязательное поле"],
      reviewRules: [
        (v) => !!v || "Отзыв обязательное поле",
        (v) => (v && v.length > 10) || "Отзыв должен быть не менее 10 символов",
      ],
    };
  },

  props: {
  },

  methods: {
    ...mapActions(["addReview"]),
    emotion(val) {
      return this.icons[val];
    },
    closeDialog() {
      this.$emit("close-dialog");
    },
    sendReview() {
      const valid = this.$refs.form.validate();
      if (!valid) return;
      const { name, email, phone, review, grade } = this;
      this.$emit("close-dialog");
      this.addReview({ name, email, phone, review, grade });
    },
  },
};
</script>

<style>
.thumb {
  font-size: 24px;
  width: 24px;
  height: 24px;
  line-height: 2;
}
</style>
