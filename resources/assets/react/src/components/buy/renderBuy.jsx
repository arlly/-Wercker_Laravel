import React, { Component } from 'react';
import PropTypes from 'prop-types';
import CurrencyFormList from '../currencyFormList';
import Sidebar from '../sidebar';
import Modal from '../modal';
import Stock from '../stock';

export default class RenderBuy extends Component {
  constructor(props) {
    super(props);
  }

  renderPage() {
    return (
      <div className="app">
        <CurrencyFormList
          handleModal={this.props.handleModal}
          handleChange={this.props.handleChange}
          foreignCurrency={this.props.foreignCurrency}
          config={this.props.config}
          page={this.props.page}
        />
        <Sidebar
          config={this.props.config}
          handleModal={this.props.handleModal}
          handleCart={this.props.handleCart}
          data={this.props.data}
        />
        { (this.props.isOpen && this.props.foreignCurrency > 0) &&
          <Modal
            component={Stock}
            data={this.props.data}
            handleModal={this.props.handleModal}
            handleCart={this.props.handleCart}
            handleChange={this.props.handleChange}
            config={this.props.config}
          /> }
      </div>
    );
  }

  render() {
    return (this.renderPage());
  }
}

RenderBuy.propTypes = {
  foreignCurrency: PropTypes.number.isRequired,
  handleModal: PropTypes.func.isRequired,
  handleChange: PropTypes.func.isRequired,
  handleCart: PropTypes.func.isRequired,
  isOpen: PropTypes.bool.isRequired,
  config: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object,
  ]).isRequired,
  data: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object,
  ]).isRequired,
};
