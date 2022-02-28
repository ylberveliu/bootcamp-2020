<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png" />
    <p>Hello:</p> <Hello />
    <p>NewHello:</p> <NewHello />
    <Todos />
    
    <keep-alive>
      <component v-bind:is="c"></component>
    </keep-alive>

    <a @click="c = 'Login'">Login</a> | <a @click="c = 'Register'">Register</a>
  </div>
</template>

<script>
import Hello from './components/Hello.vue';
import NewHello from './components/NewHello.vue';
import Todos from './components/Todos.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';

export default {
  name: "App",
  components: {
    Hello,
    NewHello,
    Todos,
    Login,
    Register
  },
  data() {
    return {
      c: "Login"
    }
  }
};
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
