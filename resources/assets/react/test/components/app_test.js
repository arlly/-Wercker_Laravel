import { renderComponent, expect } from '../test_helper';
import App from '../../src/components/app';

describe('App', () => {
  let component;

  beforeEach(() => {
    component = renderComponent(App);
  });

  it('has a correct class', () => {
    expect(component).to.have.className('app');
  });

  it('shows a currency form', () => {
    expect(component.find('.currency-form')).to.exist();
  });

  it('shows a sidebar', () => {
    expect(component.find('.side')).to.exist();
  });
});
