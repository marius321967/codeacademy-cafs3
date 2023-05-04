import { describe, expect, it } from 'vitest'
import { mount } from '@vue/test-utils'
import TaskPriorityIndicator from '../../src/components/TaskPriorityIndicator.vue'
import { Priority } from '../../src/interfaces'

describe('TaskPriorityIndicator', () => {
  it('should have class task-priority-low', () => {
    const props = { priority: Priority.low }
    const wrapper = mount(TaskPriorityIndicator, { props })

    expect(wrapper.find('.task-priority').classes()).include(
      'task-priority-low'
    )
  })

  it('should have class task-priority-medium', () => {
    const props = { priority: Priority.medium }
    const wrapper = mount(TaskPriorityIndicator, { props })

    expect(wrapper.find('.task-priority').classes()).include(
      'task-priority-medium'
    )
  })

  it('should have class task-priority-high', () => {
    const props = { priority: Priority.high }
    const wrapper = mount(TaskPriorityIndicator, { props })

    expect(wrapper.find('.task-priority').classes()).include(
      'task-priority-high'
    )
  })
})
