<script setup lang="ts">
import { computed } from 'vue'
import type { ITask } from '../../interfaces'

const props = defineProps<{
  task: ITask
}>()

const task = computed(() => props.task)

const taskUrl = computed(() => `/tasks/${task.value.id}`)
</script>

<template>
  <tr>
    <td>
      <router-link :to="taskUrl">{{ task.title }}</router-link>
    </td>
    <td>
      <template v-if="task.deadline">{{ task.deadline }}</template>

      <small v-if="!task.deadline" class="text-muted">none</small>
    </td>
    <td>{{ task.is_completed ? 'Yes' : 'No' }}</td>
  </tr>
</template>
