import React, { Component } from 'react';
import RenderBuy from './buy/renderBuy';

const elem = document.getElementById('app');
const token = elem.getAttribute('content');
const page = elem.getAttribute('data-page');
const config = {
  headers: {
    'X-CSRF-TOKEN': token,
  },
};

export default class App extends Component {
  constructor() {
    super();
    this.state = {
      isOpen: false,
      foreignCurrency: 0,
      currencyId: '',
      currencyName: '',
      result: [],
    };
    this.handleModal = this.handleModal.bind(this);
    this.handleChange = this.handleChange.bind(this);
    this.handleCart = this.handleCart.bind(this);
  }

  handleCart(data) {
    this.setState({
      result: data,
    });
  }

  handleModal(state) {
    this.setState({
      isOpen: state,
    });
  }

  handleChange(state) {
    this.setState({
      currencyId: state.currencyId,
      currencyName: state.currencyName,
      foreignCurrency: state.foreignCurrency,
    });
  }

  render() {
    return (
      <div>
        {(() => {
          switch (page) {
            case 'sell':
              return null;
            default: return (
              <RenderBuy
                isOpen={this.state.isOpen}
                data={this.state}
                handleModal={this.handleModal}
                handleChange={this.handleChange}
                handleCart={this.handleCart}
                foreignCurrency={this.state.foreignCurrency}
                config={config}
                page={page}
              />
            );
          }
        })()}
      </div>
    );
  }
}
