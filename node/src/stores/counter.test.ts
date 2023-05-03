import { createPinia, setActivePinia } from 'pinia'
import { describe, expect, it, beforeEach } from 'vitest'
import { useCounterStore } from './counter'

describe('stores/counter', () => {
  beforeEach(() => {
    setActivePinia(createPinia())
  })

  it('count initially is 0', () => {
    const { count } = useCounterStore()

    expect(count).toEqual(0)
    // expect(Number.isInteger(count)).toEqual(true)
  })

  it('count should increase by 1 when incrementing', () => {
    // given
    const store = useCounterStore()
    // when
    store.increment()
    // then
    expect(store.count).toEqual(1)
  })

  it('double count should increase by 2 when incrementing', () => {
    // given
    const store = useCounterStore()
    // when
    store.increment()
    // then
    expect(store.doubleCount).toEqual(2)
  })

  it('reset should return count to 0', () => {
    // given
    const store = useCounterStore()
    // when
    store.increment()
    store.reset()
    // then
    expect(store.count).toEqual(0)
    expect(store.doubleCount).toEqual(0)
  })
})
