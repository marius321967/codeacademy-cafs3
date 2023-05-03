import { describe, expect, it } from 'vitest'
import { sum } from './sum'

describe('services/sum', () => {
  it('should return correct sum 1+2=3', () => {
    // given
    const a = 1
    const b = 2

    // when
    const result = sum(a, b)

    // then
    expect(result).toEqual(3)
  })

  it('should return -1+5 = 4', () => {
    // given
    const a = -1
    const b = 5

    // when
    const result = sum(a, b)

    // then
    expect(result).toEqual(4)
  })
})
