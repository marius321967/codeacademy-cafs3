<script setup lang="ts">
import { onMounted } from 'vue'
import { useTasksStore } from '../stores/tasks'
import Task from './Tasks/Task.vue'
import TaskForm from './Tasks/TaskForm.vue'

const tasksStore = useTasksStore()

onMounted(() => tasksStore.ensureTasksLoaded())
</script>

<template>
  <div>
    <div>
      <task-form @task-created="tasksStore.refreshTasks()" />
    </div>

    <hr />

    <table class="table" v-if="tasksStore.tasks !== null">
      <thead>
        <tr>
          <th>Task</th>
          <th>Deadline</th>
          <th>Completed</th>
        </tr>
      </thead>

      <tbody>
        <task v-for="task in tasksStore.tasks" :task="task"></task>
      </tbody>
    </table>

    <div
      class="spinner-border text-success"
      v-if="tasksStore.isLoading && tasksStore.tasks === null"
    >
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</template>
