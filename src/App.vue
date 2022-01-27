<template>
  <v-app>
    <v-app-bar app color="#00cccc" dark elevation="4" md3 >
      <div class="d-flex align-center">
        <v-img
          alt="Logo"
          class="shrink mr-1"
          contain
          src="./assets/137993883.jpg"
          transition="scale-transition"
          width="60"
        />
         <v-btn href="/" text>
          <span class="mr-2">Главная</span>
        </v-btn>
 
        <v-btn href="/services" text>
          <span class="mr-5">Наши услуги</span>
        </v-btn>
 
        <v-btn href="/reviews" text>
          <span class="mr-5">Отзывы</span>
        </v-btn>
 
        <v-btn href="/about" text>
          <span class="mr-5">О нас</span>
        </v-btn>
 
        <v-btn href="/login" text>
          <span class="mr-5">Войти</span>
        </v-btn>
 
        <v-btn href="/registration" text>
          <span class="mr-5">Регистрация</span>
        </v-btn>

        <v-menu offset-y class="mr-5">
          <template v-slot:activator="{ on, attrs }">
            <v-btn color="#00cccc" v-bind="attrs" v-on="on" elevation="0">
              Ситтеры
            </v-btn>
          </template>
          <v-list color="#00cccc">
            <v-list-item
              v-for="(item, index) in items"
              :key="index"
              :href="item.path"
            >
              <v-btn color="#ffffff" text>
                <span class="mr-5">{{ item.title }}</span>
              </v-btn>
            </v-list-item>
          </v-list>
        </v-menu>
      </div>
    </v-app-bar>

    <v-main>
      <router-view />
    </v-main>

    <v-footer app dark color="#00cccc" elevation="7">
      <!--strong> {{ new Date().getFullYear() }} - Geekbrains Выпускной проект "Добрый"</strong-->
      <v-btn
        text
        href="https://github.com/ematrosov/gb_project"
        target="_blank"
      >
        <span class="mr-1"
          >{{ new Date().getFullYear() }} - Geekbrains Выпускной проект "Добрый
          друг"</span
        >
      </v-btn>
      <v-spacer></v-spacer>

      <v-btn v-for="icon in icons" :key="icon" dark icon>
        <v-icon size="24px">
          {{ icon }}
        </v-icon>
      </v-btn>
    </v-footer>
  </v-app>
</template>

<script>
export default {
  name: "App",
  data: () => ({
    items: [
      { title: "Найти ситтера", path: "/find-sitter" },
      { title: "Стать ситтером", path: "/become-sitter" },
    ],
    icons: ["mdi-facebook", "mdi-twitter", "mdi-instagram"],
    //
  }),
};
</script>

<style>
@import "./assets/style.css";
</style>