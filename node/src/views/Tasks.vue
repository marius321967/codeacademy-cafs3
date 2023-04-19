<script setup lang="ts">
import { onMounted, ref } from 'vue'
import type { ITask } from '../interfaces'
import axios from 'axios'
import Task from './Tasks/Task.vue'

const tasks = ref<ITask[]>([])

onMounted(() => {
  axios.get('http://localhost/tasks').then((res) => {
    tasks.value = res.data
  })
})
</script>

<template>
  <div>
    <table class="table">
      <thead>
        <tr>
          <th>Task</th>
          <th>Deadline</th>
          <th>Completed</th>
        </tr>
      </thead>

      <tbody>
        <task v-for="task in tasks" :task="task"></task>
      </tbody>
    </table>
  </div>
</template>
