export default {
  actions: {
    addReview({ commit }, review) {
      var ttt = commit; commit = ttt;
      var data = new FormData();
      data.append( "json", JSON.stringify( review ) );
      fetch("/api/reviews", { method: "POST", body: data })
      .then(response => response.json())
      .then(data => {
        if (data['success'] == true)
        {
           this.dispatch('fetchDataFromApi', review);
        }
        else
        {
          console.log(data['message']);
        }
      })
      .catch((error) => {
        console.log(error.statusText)
      });
    },
    fetchDataFromApi({ commit }) {          
      fetch("/api/reviews")
      .then(response => response.json())
      .then(data => {
        if (data['success'] == true)
        {
          commit('updateData', data.data);
        }
        else
        {
          console.log(data['message']);
          commit('updateData', { });
        }
      })
      .catch((error) => {
        console.log(error.statusText)
        commit('updateData', { });
      });
    }
  },
  state: {
    reviews: [
      {
        id: 0,
        name: 'Рустем',
        review: 'О сервисе могу сказать только положительное. Ребята делают все четко по времени, специалисты с хорошей подготовкой, с вариантами выбора выгульщика. Сервис мне очень нравится. Могу рекомендовать.',
        avatar: '',
        grade: 5
      },
      {
        id: 1,
        name: 'Алена',
        review: 'Очень удобный сервис для людей, любящих своих питомцев, у которых не всегда есть время на длительные прогулки ) спасибо вам! Молли очень полюбила свою выгульщицу Риту, ждёт ее с нетерпением',
        avatar: '',
        grade: 4
      },
      {
        id: 2,
        name: 'Ирина',
        review: 'Спасибо огромное за помощь с нашим малышом во время карантина! Нашим выгульщиком стала Полина, внимательная девушка с очаровательным юмором. Наш такс влюбился и доверился ей с первой же встречи! Отдельное спасибо за милейшим отчётам по прогулкам! Я думаю Томми будет немного скучать по Полине ;)',
        avatar: '',
        grade: 3
      },
      {
        id: 3,
        name: 'Лилия',
        review: 'Замечательный сервис - выручалочка! Ребята, которым не страшно доверить своего любимого песика, все очень четко, пунктуально, ответственно. После каждой прогулки фоторепортаж и карта маршрута. С нами работает выгульщик Римма, для меня она как добрая фея, и погуляет, и лапки помоет)) Лимон каждый раз очень радуется Римме, когда он с ней, я абсолютно спокойна! Спасибо за помощь!',
        avatar: '',
        grade: 2
      }  
    ]
  },
  mutations: {
   updateReviews(state, payload) {
     state.reviews.push(payload);
   },
    updateData(state, newData) {
      state.reviews = newData;
    }
  },
}
