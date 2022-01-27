export default {
  actions: {
    addReview({ commit }, servis) {
      commit('updateReviews', servis);
    }
  },
  state: {
    services: [
      {
        id: 0,
        name: 'Ночная передержка',
        servis: 'Ваш питомец поживет в гостях у ситтера, пока вы в отъезде. Питомец доволен - вы спокойны!',
        avatar: 'ZHivotnye.jpg',
        grade: 5
      },
      {
        id: 1,
        name: 'Выгул',
        servis: 'Исполнитель погуляет с вашей собакой. Сколько гулять и где - решаете вы!',
        avatar: 'FVu_-kfW4A8.jpg',
        grade: 4
      },
      {
        id: 2,
        name: 'Дневная передержка',
        servis: 'Няня позаботится о питомце у вас дома, либо заберет его к себе на несколько часов',
        avatar: 'Dogs_Cats_White_background_Brunette_girl_Glance_563910_1280x848.jpg',
        grade: 3
      }      
    ]
  },
  mutations: {
    updateReviews(state, payload) {
      state.services.push(payload);
    }
  },
}
