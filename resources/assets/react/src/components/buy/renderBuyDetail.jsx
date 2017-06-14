import React, { Component } from 'react';
import CurrencyFormList from '../currencyFormList';
import Sidebar from '../sidebar';
import Modal from '../modal';
import Stock from '../stock';

export default class RenderBuyDetail extends Component {
  constructor(props) {
    super(props);
  }

  renderDetail() {
    return (
      <div>
        <CurrencyFormList
          isOpen={this.state.isOpen}
          handleModal={this.handleModal}
          handleChange={this.handleChange}
          foreignCurrency={this.state.foreignCurrency}
          config={this.props.config}
        />
        <Sidebar
          config={this.props.config}
          handleModal={this.handleModal}
          onCart={this.state.onCart}
        />
      </div>
    );
  }


  render() {
    return (this.renderDetail());
  }
}
