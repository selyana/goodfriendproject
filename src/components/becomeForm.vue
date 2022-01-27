<template>
  <div>
    <v-form ref="form">
      <v-card-text>
        <v-text-field
          color="#18a8b5"
          label="Ваше имя"
          outlined
          clearable
          v-model="application.name"
          @input="checkNameField"
          :error-messages="errorMessages.name"
        ></v-text-field>

        <v-text-field
          color="#18a8b5"
          label="Ваша фамилия"
          outlined
          clearable
          v-model="application.lastName"
          @input="checkLastNameField"
          :error-messages="errorMessages.lastName"
        ></v-text-field>

        <v-textarea
          color="#18a8b5"
          v-model="application.text"
          label="Расскажите о Вашем опыте работы с животными и почему Вы хотите стать нашим ситтером"
          outlined
          clearable
          :error-messages="errorMessages.text"
          @input="checkTextField"
        />

        <v-select
          item-color="#18a8b5"
          color="#18a8b5"
          :items="animals"
          label="Выберите, с какими животными Вы готовы работать"
          chips
          multiple
          v-model="application.animals"
          :error-messages="errorMessages.animals"
          @input="checkAnimalsField"
        ></v-select>

        <v-select
          item-color="#18a8b5"
          color="#18a8b5"
          :items="cityAreas"
          label="Выберите, в каких районах города Вы готовы работать"
          chips
          multiple
          v-model="application.cityAreas"
          :error-messages="errorMessages.cityAreas"
          @input="checkCityAreasField"
        ></v-select>

        <v-label> Номер телефона для связи </v-label>

        <VuePhoneNumberInput color="#18a8b5" class="mb-5" v-model="application.number" />

        <h4 class="red--text font-weight-regular">
          {{ errorMessages.number }}
        </h4>

        <v-text-field
          color="#18a8b5"
          label="Ваша почта"
          outlined
          clearable
          v-model="application.email"
          @input="checkEmailField"
          :error-messages="errorMessages.email"
        ></v-text-field>

        <v-text-field
          color="#18a8b5"
          label="Ссылка на Вашу страницу в социальных сетях"
          outlined
          clearable
          v-model="application.socialMedia"
          @input="checkSocialMediaField"
          :error-messages="errorMessages.socialMedia"
        ></v-text-field>

        <v-checkbox
          color="#18a8b5"
          v-model="application.agreement"
          label="Согласие на обработку персональных данных"
          :error-messages="errorMessages.agreement"
        ></v-checkbox>
      </v-card-text>
    </v-form>
    <DefaultButton
      class="applicationBtn"
      :button-info="buttonInfo"
      @eventHandler="sendApplication"
    />
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
    <v-dialog v-model="dialog" width="500">
      <v-card>
        <v-card-title class="text-h5"> Ваша заявка отправлена </v-card-title>

        <v-card-text>
          Наши менеджеры свяжутся с Вами в ближайшее время, спасибо!
        </v-card-text>
      </v-card>
    </v-dialog>
  </div>
</template>


<script>
import DefaultButton from "./defaultButton";
import VuePhoneNumberInput from "vue-phone-number-input";
import "vue-phone-number-input/dist/vue-phone-number-input.css";

export default {
  components: { DefaultButton, VuePhoneNumberInput },
  data() {
    return {
      animals: [
        "Кошки",
        "Собаки",
        "Птицы",
        "Рыбки",
        "Грызуны",
        "Экзотические животные",
      ],
      cityAreas: ["Север", "Восток", "Запад", "Юг", "Центр"],
      buttonInfo: {
        text: "Отправить",
      },
      loading: false,
      dialog: false,
      reg: /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
      application: {
        name: "",
        lastName: "",
        text: "",
        animals: [],
        cityAreas: [],
        number: "",
        socialMedia: "",
        email: "",
        agreement: false,
      },
      errorMessages: {
        name: "",
        lastName: "",
        text: "",
        animals: "",
        cityAreas: "",
        number: "",
        socialMedia: "",
        email: "",
        agreement: "",
      },
    };
  },

  methods: {
    sendApplication() {
      if (!this.validate()) {
        return false;
      }
      this.loading = true;

      var data = new FormData();
      data.append("json", JSON.stringify(this.application));
      fetch("/api/become_sitter", {method: "POST", body: data})
          .then(response => response.json())
          .then(data => {
            if (data['success'] == true) {
              this.loading = false;
              this.dialog = true;
            } else {
              console.log(data['message']);
              this.loading = false;
              this.dialog = true;
            }
          })
          .catch((error) => {
            console.log(error.statusText)
            this.loading = false;
            this.dialog = true;
          });


      // setTimeout(() => ((this.loading = false), (this.dialog = true)), 2000);
    },

    checkNameField() {
      if (this.application.name === "" || this.application.name === null) {
        this.errorMessages.name = "Поле должно быть заполнено";
        return false;
      } else {
        this.errorMessages.name = "";
      }
      return true;
    },

    checkLastNameField() {
      if (
        this.application.lastName === "" ||
        this.application.lastName === null
      ) {
        this.errorMessages.lastName = "Поле должно быть заполнено";
        return false;
      } else {
        this.errorMessages.lastName = "";
      }
      return true;
    },

    checkTextField() {
      if (this.application.text === "" || this.application.text === null) {
        this.errorMessages.text = "Поле должно быть заполнено";
        return false;
      } else {
        this.errorMessages.text = "";
      }
      return true;
    },

    checkAnimalsField() {
      if (this.application.animals.length === 0) {
        this.errorMessages.animals = "Отметьте животных";
        return false;
      } else {
        this.errorMessages.animals = "";
      }
      return true;
    },

    checkCityAreasField() {
      if (this.application.cityAreas.length === 0) {
        this.errorMessages.cityAreas = "Отметьте районы города";
        return false;
      } else {
        this.errorMessages.cityAreas = "";
      }
      return true;
    },

    checkNumberField() {
      if (this.application.number === "" || this.application.number === null) {
        this.errorMessages.number = "Поле должно быть заполнено";
        return false;
      } else {
        this.errorMessages.number = "";
      }
      return true;
    },

    checkEmailField() {
      if (this.application.email === "" || this.application.email === null) {
        this.errorMessages.email = "Поле должно быть заполнено";
        return false;
      } else if (this.reg.test(this.application.email) === false) {
        this.errorMessages.email = "Введите валидный email";
        return false;
      } else {
        this.errorMessages.email = "";
      }
      return true;
    },

    checkSocialMediaField() {
      if (
        this.application.socialMedia === "" ||
        this.application.socialMedia === null
      ) {
        this.errorMessages.socialMedia = "Поле должно быть заполнено";
        return false;
      } else {
        this.errorMessages.socialMedia = "";
      }
      return true;
    },

    checkAgreementField() {
      if (this.application.agreement === false) {
        this.errorMessages.agreement =
          "Без согласия на обработку данных не получится обработать заявку";
        return false;
      } else {
        this.errorMessages.agreement = "";
      }
      return true;
    },

    validate() {
      return (
        this.checkNameField() &&
        this.checkLastNameField() &&
        this.checkTextField() &&
        this.checkAnimalsField() &&
        this.checkCityAreasField() &&
        this.checkNumberField() &&
        this.checkEmailField() &&
        this.checkSocialMediaField() &&
        this.checkAgreementField()
      );
    },
  },
};
</script>