<script setup lang="ts">
import { computed, onMounted, ref } from 'vue'
import axios from 'axios'

let count = ref(0)

const increment = () => count.value++

const tasks = ref([])

onMounted(() => {
  axios.get('http://localhost/tasks').then((res) => (tasks.value = res.data))
})

const isCompletedLabel = (task) => (task.is_completed ? 'Yes' : 'No')

const taskClasses = (task) => [task.is_completed ? 'task-completed' : 'task-not-completed']
</script>

<template>
  <div>
    <button @click="increment">Count is: {{ count }} (sq: {{ squared }})</button>

    <ul>
      <li v-for="(task, index) in tasks" :class="taskClasses(task)">
        {{ task.title }}
        <strong>{{ isCompletedLabel(task) }}</strong>
        <button @click="remove(index)">Delete</button>
      </li>
    </ul>
  </div>
</template>

<style>
.task-completed {
  background-color: rgb(153, 255, 1);
}
.task-not-completed {
  background-color: rgba(255, 255, 8, 0.792);
}
</style>
