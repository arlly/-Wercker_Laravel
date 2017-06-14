import { renderComponent, expect } from '../test_helper';
import CurrencyForm from '../../src/components/currencyForm';

describe('CurrencyForm', () => {
  let component;

  beforeEach(() => {
    component = renderComponent(CurrencyForm);
  });

  it('has a correct class', () => {
    expect(component).to.have.className('currency-form');
  });
});
