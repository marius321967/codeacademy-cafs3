import { describe, expect, it } from 'vitest'
import { mount } from '@vue/test-utils'
import LoginForm from './LoginForm.vue'
import { createPinia, setActivePinia } from 'pinia'

describe('LoginForm', () => {
  it('submit button should become disabled when clicking on it', () => {
    setActivePinia(createPinia())
    const wrapper = mount(LoginForm)

    // console.log(wrapper.find('[data-testid=submit-button]').attributes())
  })
})
