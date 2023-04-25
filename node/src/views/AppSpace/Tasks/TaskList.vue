<script setup lang="ts">
import type { ITask } from '../../interfaces'
import Task from './Task.vue'

const emit = defineEmits<{
  (e: 'removeTask', id: number): void
  (e: 'selectTask', task: ITask): void
}>()

const props = defineProps<{
  tasks: ITask[]
}>()

const onTaskRemove = (id: number) => emit('removeTask', id)
const onTaskSelect = (task: ITask) => emit('selectTask', task)
</script>

<template>
  <table class="table" v-if="props.tasks !== null">
    <thead>
      <tr>
        <th>Task</th>
        <th>Deadline</th>
        <th>Completed</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <task
        v-for="task in props.tasks"
        :task="task"
        @remove="onTaskRemove(task.id)"
        @select="onTaskSelect(task)"
      ></task>
    </tbody>
  </table>
</template>
