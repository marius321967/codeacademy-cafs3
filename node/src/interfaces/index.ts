export type IProduct = {
  name: string
  description: string
}

export type ITask = {
  id: number
  title: string
  deadline: string | null
  priority: Priority
  is_completed: boolean
  created_at: string | null
  updated_at: string | null
  user_id: number | null
  last_updated_user_id: number | null
}

export enum Priority {
  high = 'high',
  medium = 'medium',
  low = 'low'
}
