import axios from 'axios'
import { defineStore } from 'pinia'
import { ref } from 'vue'
import type { ITask } from '../interfaces'

export const useTasksStore = defineStore('tasks', () => {
  const tasks = ref<ITask[] | null>(null)
  const isLoading = ref(false)

  const refreshTasks = () => {
    isLoading.value = true

    axios.get('http://localhost/tasks').then((res) => {
      tasks.value = res.data
      isLoading.value = false
    })
  }

  const ensureTasksLoaded = () => {
    if (tasks.value === null) {
      refreshTasks()
    }
  }

  return {
    tasks,
    isLoading,
    refreshTasks,
    ensureTasksLoaded
  }
})
