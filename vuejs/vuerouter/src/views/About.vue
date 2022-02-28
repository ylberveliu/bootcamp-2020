<template>
  <div class="about">
    <h1>About</h1>
    <p>
      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iste, nemo magnam! Voluptatem corporis rem culpa, velit quos autem officia sunt cumque? Quis labore voluptas nisi at, dolorum qui nemo tempore?
    </p>
    <transition name="fade">
      <div v-if="readmore">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum veniam quos explicabo sapiente doloribus itaque quasi eius sit dignissimos, consequuntur laboriosam alias voluptatum consectetur, accusantium aliquam obcaecati. Fugit, debitis deserunt.
          <br />
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae debitis a laudantium suscipit, eius ratione officia exercitationem doloribus voluptate sunt facere enim, possimus, nihil expedita. Vitae corporis delectus nam ratione!
          <br />
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod assumenda earum, architecto, porro neque libero est qui numquam ratione, nemo ad odit nisi reprehenderit delectus sunt eveniet magni nostrum officiis.
        </p>
      </div>
    </transition>
    <a @click="readmore = !readmore">{{ linkTitle }}</a>
  </div>
</template>


<script>
export default {
  name: "About",
  data() {
    return {
      readmore: false
    }
  },
  computed: {
    linkTitle() {
      if(this.readmore) 
        return "Read less";
      else
        return "Read more";
    }
  }
}
</script>

<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 1s ease-out;
}

.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>