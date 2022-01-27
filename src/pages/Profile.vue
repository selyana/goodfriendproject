<template>  
  <div class="profile">
    <div class="profile_img">
      <img class="profile_img__image" src="#" alt="Фото профиля" />
    </div>    
    <div class="profile_info">
      <p>{{ this.name }}</p>
      <p>{{ this.surname }}</p>
      <p>{{ this.dateBirthday }}</p>
      <p>{{ this.city }}</p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "Marina",
      surname: "Churmeeva",
      dateBirthday: "21.09.1993",
      city: "Nizny Novgorod",
    };
  },
};
</script>

<style>
.profile {
  height: 100%;
  display: flex;
  justify-content: space-around;
  margin-top: 125px;
}
.profile_img {
  width: 200px;
  height: 200px;
  padding-top: 80px;
  border: 1px solid black;
  box-sizing: border-box;
  border-radius: 50%;
  text-align: center;
}