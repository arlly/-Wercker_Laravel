import React from 'react';
import { JSDOM } from 'jsdom';
import { render } from 'enzyme';
import chai, { expect } from 'chai';
import dirtyChai from 'dirty-chai';
import chaiEnzyme from 'chai-enzyme';
import { Provider } from 'react-redux';
import { createStore } from 'redux';
import reducers from '../src/reducers';

chai.use(chaiEnzyme());
chai.use(dirtyChai);

const jsdom = new JSDOM('<!doctype html><html><body><p>Hello world</p></body></html>');
const exposedProperties = ['window', 'navigator', 'document'];

global.window = jsdom.window;
global.document = jsdom.window.document;

Object.keys(document.defaultView).forEach((property) => {
  if (typeof global[property] === 'undefined') {
    exposedProperties.push(property);
    global[property] = document.defaultView[property];
  }
});

global.navigator = {
  userAgent: 'node.js',
};

function renderComponent(ComponentClass, props = {}, state = {}) {
  const componentInstance = render(
    <Provider store={createStore(reducers, state)}>
      <ComponentClass {...props} />
    </Provider>,
  );

  return componentInstance;
}

export { renderComponent, expect };
