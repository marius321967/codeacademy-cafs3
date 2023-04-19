<script setup lang="ts">
import { onMounted, ref } from 'vue'
import type { ITask } from '../interfaces'
import axios from 'axios'
import Task from './Tasks/Task.vue'

const props = defineProps<{
  id: string
}>()

const task = ref<ITask | null>(null)

onMounted(() => {
  axios.get(`http://localhost/tasks/${props.id}`).then((res) => {
    task.value = res.data
  })
})
</script>

<template>
  <div class="container">
    <div v-if="task !== null">
      Your task is:
      <strong>{{ task.title }}</strong>
    </div>
  </div>
</template>
