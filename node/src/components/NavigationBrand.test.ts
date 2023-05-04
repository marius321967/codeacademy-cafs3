import { mount } from '@vue/test-utils'
import { describe, expect, it } from 'vitest'
import NavigationBrand from './NavigationBrand.vue'

describe('NavigationBrand', () => {
  it('should display provided application name', () => {
    const wrapper = mount(NavigationBrand, {
      global: {
        provide: {
          'app-name': 'Example App #1'
        }
      }
    })

    expect(wrapper.find('[data-testid="title"]').text()).toEqual(
      'Example App #1'
    )
  })
})
