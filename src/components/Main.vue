<template>
  <v-container class="display">    
      <v-row>   
      <v-col>       
        <div class="text-color">
          <h1>Уезжаешь?</h1>
          <h2>
            Не с кем оставить
            <br />
            своего любимого питомца?
          </h2>
          <h2>Тебе поможет</h2>
          <h1 class="textGoodFriend">Добрый друг!</h1>                  
          <div>
            <v-btn color="#18a8b5" href="/services">
              <span class="mr-1 text-btn">Перейти к услугам</span>
            </v-btn>
          </div>
        </div>
      </v-col>
      <v-col class="d-flex align-center">
        <v-img
          :src="require('../assets/pexels-photo-3945402.jpeg')"
          class="img-large"
          height="100%"
        />
      </v-col>
      </v-row>   
      
  </v-container>
</template>

<script>
export default {
  name: "Main",

  data: () => ({}),
};
</script>
