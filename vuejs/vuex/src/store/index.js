import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    message: 'Hello from Vuex',
    todos: []
  },                    
  mutations: {
    SET_TODOS(state, todos) {
      state.todos = todos;
    },
    ADD_TASK(state, title) {
      state.todos.push({title: title, completed: false});
    }
  },                
  actions: {
    getTodos(context) {
      fetch('https://jsonplaceholder.typicode.com/todos')
        .then(res => res.json()) 
        .then(data => context.commit('SET_TODOS', data))
        .catch(e => console.log(e));
    },
    addTask(context, title) {
      context.commit('ADD_TASK', title);
    }
  },                 
  getters: {
    completedTask(state) {
      return state.todos.filter(todo => todo.completed == false)
    }
  }                   
});
