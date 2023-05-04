import axios from 'axios'
import type { InjectionKey } from 'vue'

export type TaskRemover = (id: number) => Promise<any>

export const removeTaskKey = Symbol() as InjectionKey<TaskRemover>

export const removeTask: TaskRemover = (id) =>
  axios.delete(`http://localhost/tasks/${id}`)
