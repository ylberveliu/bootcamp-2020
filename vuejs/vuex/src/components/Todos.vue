<template>
    <div>
        <ul>
            <li v-for="todo in completedTasks" :key="todo.id"> <!-- $store.state.todos -->
                {{ todo.title }} - {{ todo.completed }}
            </li>
        </ul>
        <input type="text" v-model="title" @keyup.enter="createTask" />
    </div>
</template>

<script>
export default {
    name: "Todos",
    data() {
        return {
            title: ""
        }
    },
    methods: {
        createTask() {
            this.$store.dispatch("addTask", this.title);
            this.title = '';
        }
    },
    computed: {
        completedTasks() {
            return this.$store.getters.completedTask;
        }
    },
    mounted() {
        //this.$store.dispatch("getTodos");
    }
}
</script>