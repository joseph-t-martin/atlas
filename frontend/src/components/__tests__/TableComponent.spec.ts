import { describe, it, expect } from 'vitest';
import { mount } from '@vue/test-utils';
import TableComponent from '../TableComponent.vue';

describe('TableComponent', () => {
  it('renders properly', () => {
    const wrapper = mount(TableComponent, { props: { headings: ['header1'], data: [['first row']] } })
    expect(wrapper.text()).toContain('header1')
    expect(wrapper.text()).toContain('first row')
  })
})
