import { renderComponent, expect } from '../test_helper';
import Sidebar from '../../src/components/sidebar';

describe('Sidebar', () => {
  let component;

  beforeEach(() => {
    component = renderComponent(Sidebar);
  });

  it('has a correct class', () => {
    expect(component).to.have.className('side');
  });
});
