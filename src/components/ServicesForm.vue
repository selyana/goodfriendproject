<template>
  <v-card>
    <v-card-title>
      <v-btn color="#18a8b5" class="card-outter text-btn" @click="sendReview">Отправить заявку</v-btn>
      <v-spacer></v-spacer>

      <v-btn color="#18a8b5" class="card-outter text-btn" @click="closeDialog">
        <v-icon>mdi-close</v-icon>
      </v-btn>
    </v-card-title>

    <v-card-title class="text-center">
      <h4>
        Для получения услуги <H3>"{{ this.servis.name }}"</H3> заполните
        обязательные поля (*) и нажмите кнопку <br />
        "Отправить заявку". <br />
        Если на нашем сайте вы подобрали ситтера для <br />
        своего питомца - укажите его имя в комментарии. <br />
        В ближайшее время наш менеджер свяжется с вами.
      </h4>
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
                label="Ваш комментарий"
                outlined
                required
                v-model="review"
                class="mb-3"
              ></v-textarea>
            </v-col>
          </v-row>

          <v-dialog v-model="loading" persistent width="300">
            <v-card color="#18a8b5" dark>
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
          <v-dialog v-model="dialog" width="320">
            <v-card  class="text-center">
              <v-card-title  class="h1">
                Ваша заявка принята <br>             
                Спасибо, что выбрали нас!
              </v-card-title>
            </v-card>
          </v-dialog>
        </v-container>
        <!--small>Поля отмеченные * обязательные для заполнения</small-->
      </v-form>
    </v-card-text>
  </v-card>
</template>

<script>
import { mapActions } from "vuex";
export default {
  name: "ReviewsForm",
  props: {
    servis: {
      type: Object,
      required: true,
    },
  },
  data() {
    return {
      loading: false,
      dialog: false,
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
  mounted() {},

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
      // this.$emit("close-dialog");
      this.addReview({ name, email, phone, review, grade });
    //},
    //postReview() {
      //if (!this.validate()) {
      //        return false
      //    }
      this.loading = true;
      setTimeout(
        () => (
          (this.loading = false),
          (this.isReviewWindowOn = false),
          (this.dialog = true)
        ),
        2000
      );
      // отправка
    },
  },
};
</script>

<style>
.thumb {
  font-size: 20px;
  width: 24px;
  height: 20px;
  line-height: 2;
}
</style>
