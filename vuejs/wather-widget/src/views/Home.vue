<template>
  <div class="home">
    <form class="form-inline mb-5">
      <input class="form-control full" @keyup.enter="search" type="search" placeholder="US Zipcode, UK Postcode, Canada Postalcode, IP address, Latitude/Longitude (decimal degree) or city name." aria-label="Search">
    </form>
    <Weather :w="$store.state.data" v-if="$store.state.data !== null" />
    <p>
      API Documentation: <a href="https://www.weatherapi.com/docs/" target="_blank">Weather API</a>
    </p>
    <!-- {{ getAPIURL }} -->
  </div>
</template>

<script>
// @ is an alias to /src
import Weather from "@/components/Weather.vue"; 
import { mapGetters } from "vuex";

export default {
  name: "Home",
  components: {
    Weather
  },
  // data() {
  //   return {
  //     api_url: "http://api.weatherapi.com/v1/current.json?key=2dce8c59b1994fe9b59153202201910&q=",
  //     query: "",
  //     data: null,
  //     default_location: null
  //   }
  // },
  methods: {
    search(e) {
      // this.$store.state.query = e.target.value;
      // this.setData(this.$store.state.api_url + this.$store.state.query);
      this.$store.dispatch("setDataWithSearchedQuery", e.target.value);
      e.target.value = '';
    }//,
    // setData(q) {
    //   fetch(q)
    //   .then(res => res.json())
    //   .then(data =>  {
    //     const weather_obj = {};
    //     weather_obj.country = data.location.country;
    //     weather_obj.region = data.location.region;
    //     weather_obj.temp_c = data.current.temp_c;
    //     weather_obj.temp_f = data.current.temp_f;
    //     weather_obj.status = data.current.condition.text;
    //     weather_obj.icon = data.current.condition.icon;
    //     weather_obj.last_updated = data.current.last_updated;
    //     weather_obj.wind_mph = data.current.wind_mph;
    //     weather_obj.humidity = data.current.humidity;

    //     this.$store.data = weather_obj;
    //   })
    //   .catch(e => console.log("Error: " + e));
    // }
  },
  created() {
    if(localStorage.getItem("default") !== null) {
      this.$store.dispatch("setDefaultLocation", localStorage.getItem("default"));
      this.$store.dispatch("setDataWithDefaultLocation");
    }
  },
  computed: {
    ...mapGetters(["getAPIURL"]),
    testComputed() {
      return "";
    }
  }
};
</script>

<style scoped>
.full {
  width: 100% !important;
}
</style>
