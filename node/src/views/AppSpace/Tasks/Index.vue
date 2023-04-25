<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { useTasksStore } from '../../../stores/tasks'
import TaskForm from './TaskForm.vue'
import TaskList from './TaskList.vue'
import type { ITask } from '../../../interfaces'

const tasksStore = useTasksStore()

const selectedTask = ref<ITask | null>(null)

onMounted(() => tasksStore.ensureTasksLoaded())

const onTaskRemove = (id: number) => tasksStore.removeTask(id)
const onTaskSelect = (task: ITask) => (selectedTask.value = task)
</script>

<template>
  <div>
    <div>
      <task-form
        :task="selectedTask"
        @task-created="tasksStore.refreshTasks()"
      />
    </div>

    <hr />

    <task-list
      :tasks="tasksStore.tasks"
      v-if="tasksStore.tasks"
      @remove-task="onTaskRemove"
      @select-task="onTaskSelect"
    ></task-list>

    <div
      class="spinner-border text-success"
      v-if="tasksStore.isLoading && tasksStore.tasks === null"
    >
      <span class="visually-hidden">Loading...</span>
    </div>
  </div>
</template>
