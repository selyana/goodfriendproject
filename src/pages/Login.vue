<template>
  <div class="login">
    <h1 class="login_title">Войти</h1>
    <form class="login_form"
        @submit.prevent="authorization">
      <input
        type="email"
        class="login_form__input"
        placeholder="Введите email"
        v-model="email" 
      />
      <input
        type="password"
        class="login_form__input"
        placeholder="Введите пароль"
        v-model="password"
      />
      <!--input type="submit" class="login_form__btn" placeholder="Войти" /-->
      <router-link to="/profile">Войти в личный кабинет</router-link>
    </form>
    <div class="no-login">
      <p>Еще не зарегистрированы?</p>
      <router-link to="/registration">Пройти регистрацию</router-link>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    authorization() {
      const { email, password } = this;
      this.$store
        .dispatch("login", { email, password })
        .then(() => this.$router.push("/"))
        .catch((err) => console.log(err));
    },
  },
  computed: {
    ...mapGetters(["getUsers"]),
  },
};
</script>

<style>
.login {
  margin: 0 auto;
  margin-top: 25px;
  width: 500px;
  height: 400px;
  border: 1px solid #000;
}
.login_title {
  margin: 25px 0;
  text-align: center;
}
.login_form {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.login_form__input {
  width: 250px;
  margin: 15px 0;
  border: 1px solid gray;
}
.login_form__btn {
  width: 100px;
  margin: 15px 0;
  border: 1px solid gray;
}
.no-login {
  margin: 15px 65px;
  display: flex;
  flex-direction: row;
}
</style>