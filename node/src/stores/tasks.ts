import { defineStore } from 'pinia'
import { inject, ref } from 'vue'
import type { ITask } from '../interfaces'
import { getTasksKey, type TasksGetter } from '../services/getTasks'
import { removeTaskKey, type TaskRemover } from '../services/removeTask'

export const useTasksStore = defineStore('tasks', () => {
  const tasks = ref<ITask[] | null>(null)
  const isLoading = ref(false)
  const getTasks = inject(getTasksKey) as TasksGetter
  const removeTaskApi = inject(removeTaskKey) as TaskRemover

  const refreshTasks = () => {
    isLoading.value = true

    getTasks().then((apiTasks) => {
      tasks.value = apiTasks
      isLoading.value = false
    })
  }

  const ensureTasksLoaded = () => {
    if (tasks.value === null) {
      refreshTasks()
    }
  }

  const removeTask = (id: number) =>
    removeTaskApi(id).then(() => refreshTasks())

  return {
    tasks,
    isLoading,
    refreshTasks,
    ensureTasksLoaded,
    removeTask
  }
})
