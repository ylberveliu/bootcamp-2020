import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    api_url: "http://api.weatherapi.com/v1/current.json?key=2dce8c59b1994fe9b59153202201910&q=",
    query: "",
    data: null,
    default_location: ""
  },
  mutations: {
    SET_DEFAULT_LOCATION(state, default_location) {
      state.default_location = default_location;
    },
    SET_DATA(state, data) {
      state.data = data;
    }
  },
  actions: {
    setDefaultLocation(context, default_location) {
      context.commit("SET_DEFAULT_LOCATION", default_location);
    },
    setDataWithDefaultLocation(context) {
      fetch(`${this.state.api_url}${this.state.default_location}`)
        .then(res => res.json())
        .then(data =>  {
          const weather_obj = {};

          weather_obj.country = data.location.country;
          weather_obj.region = data.location.region;
          weather_obj.temp_c = data.current.temp_c;
          weather_obj.temp_f = data.current.temp_f;
          weather_obj.status = data.current.condition.text;
          weather_obj.icon = data.current.condition.icon;
          weather_obj.last_updated = data.current.last_updated;
          weather_obj.wind_mph = data.current.wind_mph;
          weather_obj.humidity = data.current.humidity;

          context.commit("SET_DATA", weather_obj);
        })
        .catch(e => console.log("Error: " + e));
    },
    setDataWithSearchedQuery(context, query) {
      fetch(this.state.api_url+query)
        .then(res => res.json())
        .then(data =>  {
          const weather_obj = {};
          
          weather_obj.country = data.location.country;
          weather_obj.region = data.location.region;
          weather_obj.temp_c = data.current.temp_c;
          weather_obj.temp_f = data.current.temp_f;
          weather_obj.status = data.current.condition.text;
          weather_obj.icon = data.current.condition.icon;
          weather_obj.last_updated = data.current.last_updated;
          weather_obj.wind_mph = data.current.wind_mph;
          weather_obj.humidity = data.current.humidity;

          context.commit("SET_DATA", weather_obj);
        })
        .catch(e => console.log("Error: " + e));
    }
  },
  getters: {
    getAPIURL(state) {
      return state.api_url;
    }
  }
});
