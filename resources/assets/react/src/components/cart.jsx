import React, { Component } from 'react';
import axios from 'axios';
import PropTypes from 'prop-types';
import _ from 'lodash';

const url = document.getElementById('app').getAttribute('data-url');
const apiPath = '/WebAPI/Cart/get/1';

export default class Cart extends Component {
  constructor(props) {
    super(props);
    this.fetchCart();
  }

  fetchCart() {
    const apiUrl = url + apiPath;
    axios.get(apiUrl)
      .then((response) => {
        console.log(response);
        const result = Object.prototype.hasOwnProperty
                        .call(response, 'data')
                        ? response.data : [];
        this.props.handleCart(result);
      })
      .catch((error) => {
        console.log(error);
      });
  }

  cartNotEmpty() {
    return (
      <div className="side-widget">
        <div className="currencyNavi currencyNavi-buy">
          <p className="sideCartTitle">購入用カート</p>
          {this.renderCartDetail()}
          <div className="amount">
            <dl>
              <dt>商品合計</dt>
              <dd>{this.props.data.result.total_price}円</dd>
            </dl>
            <dl>
              <dt>送料</dt>
              <dd>100円</dd>
            </dl>
            <dl>
              <dt>お支払合計</dt>
              <dd>{this.props.data.result.total_price + 100}円</dd>
            </dl>
          </div>
        </div>
      </div>
    );
  }

  cartEmpty() {
    return (
      <div className="side-widget">
        <div className="currencyNavi currencyNavi-buy">
          <p className="sideCartTitle">購入用カート</p>
          <p>現在カートは空です</p>
        </div>
      </div>
    );
  }

  renderCartDetail() {
    return (
      _.map(this.props.data.result.cart, (cart, key) => {
        return (
          <div className="cartDetail" key={key}>
            <p className="currencyType">{cart.currency_name}</p>
            {(() => {
              return _.map(cart.bill_items, (item, unit) => (
                (item > 0) &&
                <dl key={unit}>
                  <dt>{unit}{cart.currency_name}札x {item} =</dt>
                  <dd>{unit * item}{cart.currency_name}</dd>
                </dl>
              ));
            })()}
          </div>
        );
      })
    );
  }

  render() {
    return (
      (Object.keys(this.props.data.result).length > 0)
        && this.cartNotEmpty()
    );
  }
}

Cart.propTypes = {
  data: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object,
  ]).isRequired,
  handleCart: PropTypes.func.isRequired,
};
