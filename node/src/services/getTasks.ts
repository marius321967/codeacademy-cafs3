import axios from 'axios'
import type { ITask } from '../interfaces'
import type { InjectionKey } from 'vue'

export type TasksGetter = () => Promise<ITask[]>

export const getTasksKey = Symbol() as InjectionKey<TasksGetter>

export const getTasks: TasksGetter = (): Promise<ITask[]> =>
  axios.get('http://localhost/tasks').then((res) => res.data)
