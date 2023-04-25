<script setup lang="ts">
import type { ITask } from '../../interfaces'

// not assigned to const because we're only accessing it in template
defineProps<{
  task: ITask
}>()
</script>

<template>
  <li>ID: {{ task.id }}</li>
  <li>Title: {{ task.title }}</li>
  <li>Deadline: {{ task.deadline || '-' }}</li>
  <li>Completed? - {{ task.is_completed ? 'Yes' : 'No' }}</li>
</template>
