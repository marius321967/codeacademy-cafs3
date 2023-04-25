<script setup lang="ts">
import { computed } from 'vue'
import type { ITask } from '../../interfaces'

const props = defineProps<{
  task: ITask
}>()

const emit = defineEmits<{
  (e: 'remove'): void
  (e: 'select'): void
}>()

const task = computed(() => props.task)
const taskUrl = computed(() => `/tasks/${task.value.id}`)
</script>

<template>
  <tr class="task-list-item">
    <td>
      <task-priority-indicator
        :priority="task.priority"
      ></task-priority-indicator>
      <router-link :to="taskUrl">{{ task.title }}</router-link>

      <span @click="emit('select')">(edit)</span>
    </td>
    <td>
      <template v-if="task.deadline">{{ task.deadline }}</template>

      <small v-if="!task.deadline" class="text-muted">none</small>
    </td>
    <td>{{ task.is_completed ? 'Yes' : 'No' }}</td>
    <td>
      <button
        class="btn btn-outline-danger task-delete-button"
        @click="emit('remove')"
      >
        X
      </button>
    </td>
  </tr>
</template>

<style lang="scss">
.task-delete-button {
  padding: 0 8px;
  border: none;
  // display: none;
  visibility: hidden;
  font-size: 90%;
}

.task-list-item:hover .task-delete-button {
  visibility: visible;
}
</style>
