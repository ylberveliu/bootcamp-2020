<template>
  <div>
   <div class="row">
     <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <img :src="w.icon" :alt="w.status" />
            </div>
            <p class="text-center">{{ w.status }}</p>
            <h1 class="text-center">{{ w.temp_c }} C / {{ w.temp_f }} F</h1>
            <p class="text-center"><small>{{ w.last_updated }}</small></p>
            <p class="text-center">
              {{ w.region }}, {{ w.country }}
            </p>
            <div class="d-flex justify-content-between mt-5">
              <p>
                <i class="fa fa-tint" aria-hidden="true"></i>
                {{ w.humidity }}
              </p>
              <p>
                <i class="fa fa-space-shuttle" aria-hidden="true"></i>
                {{ w.wind_mph }}
              </p>
            </div>
          </div>
        </div>
     </div>
   </div>
  </div>
</template>

<script>
export default {
  name: "Weather",
  props: ["w"]
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .card {
    margin-bottom: 50px;
  }
</style>
