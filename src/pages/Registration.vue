<template>
  <div>
    <form class="registration_form">
      <input
        type="text"
        class="registration_form__input"
        placeholder="Имя"
        v-model="name"
      />
      <input
        type="text"
        class="registration_form__input"
        placeholder="Фамилия"
        v-model="surname"
      />
      <input
        type="email"
        class="registration_form__input"
        placeholder="Электронная почта"
        v-model="email"
      />
      <input
        type="password"
        placeholder="Придумайте пароль"
        class="registration_form__input"
        v-model="firstPassword"
      />
      <input
        type="password"
        placeholder="Повторите пароль"
        class="registration_form__input"
        v-model="secondPassword"
      />
      <p v-if="this.firstPassword != this.secondPassword">
        Пароли не совпадают
      </p>
      <input
        type="submit"
        placeholder="Зарегистрироваться"
        class="registration_form__btn"
        @click="registration"
      />
    </form>
  </div>
</template>

<script>
import { mapMutations } from "vuex";
export default {
  data() {
    return {
      name: "",
      surname: "",
      email: "",
      firstPassword: "",
      secondPassword: "",
    };
  },
  methods: {
    ...mapMutations(["addNewUser"]),
    registration() {
      const { name, surname, email, firstPassword } = this;
      this.addNewUser({ name, surname, email, firstPassword });
    },
  },
};
</script>

<style>
.registration_form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  margin: 0 auto;
  margin-top: 25px;
  width: 500px;
  height: 400px;
  border: 1px solid #000;
}
.registration_form__input {
  width: 250px;
  margin: 15px 0;
  border: 1px solid gray;
}
.registration_form__btn {
  width: 100px;
  margin: 15px 0;
  border: 1px solid gray;
}
</style>