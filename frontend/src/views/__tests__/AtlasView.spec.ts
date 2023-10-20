import { describe, it, expect } from 'vitest'

import { mount } from '@vue/test-utils'
import AtlasView from '../AtlasView.vue'

describe('AtlasView', () => {
  it('page loads', () => {
    const wrapper = mount(AtlasView)
    expect(wrapper.text()).toContain('Atlas Lookup')
  })
})
