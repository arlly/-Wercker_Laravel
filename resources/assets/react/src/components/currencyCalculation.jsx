import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class CurrencyCalculation extends Component {
  constructor(props) {
    super(props);
    this.state = {
      yen: '',
      foreignCurrency: '',
      purchaseAmount: 0,
      stocks: [],
    };

    this.calculationFromYen = this.calculationFromYen.bind(this);
    this.calculationFromForeignCurrency = this.calculationFromForeignCurrency.bind(this);
  }

  calculationFromYen(e) {
    if (/^[0-9]+$/.test(e.target.value)) {
      const currency = Math.floor(e.target.value / this.props.currentRate);
      this.props.onChange({
        currencyId: this.props.currency.currency_id,
        currencyName: this.props.currency.currency_name,
        foreignCurrency: Number(currency),
      });
      this.setState({
        yen: e.target.value,
        foreignCurrency: currency,
        purchaseAmount: Math.ceil(currency * this.props.currentRate),
      });
    }
  }

  calculationFromForeignCurrency(e) {
    if (/^[0-9]+$/.test(e.target.value)) {
      const amount = Math.ceil(e.target.value * this.props.currentRate);
      this.props.onChange({
        currencyId: this.props.currency.currency_id,
        currencyName: this.props.currency.currency_name,
        foreignCurrency: Number(e.target.value),
      });
      this.setState({
        yen: amount,
        foreignCurrency: e.target.value,
        purchaseAmount: amount,
      });
    }
  }

  renderCalculation() {
    return (
      <div className="purchaseRequest">
        <div className="calculationArea sideBySide">
          <dl>
            <dt>日本円から計算</dt>
            <dd>
              <input
                type="text"
                onChange={this.calculationFromYen}
                value={this.state.yen}
              /> 円
            </dd>
          </dl>
          <dl className="calculationArea foreignCurrencyForm">
            <dt>外貨から計算</dt>
            <dd className="currency">
              <input
                type="text" onChange={this.calculationFromForeignCurrency}
                value={this.state.foreignCurrency}
              /> {this.props.currency.currency_name}
            </dd>
          </dl>
        </div>
        <p className="purchasePrice">
          ご購入金額
          <span className="price">
            {this.state.purchaseAmount.toString().replace(/(\d)(?=(\d{3})+$)/g, '$1,')}
          </span> 円
        </p>
      </div>
    );
  }

  render() {
    return (this.renderCalculation());
  }
}

CurrencyCalculation.propTypes = {
  currency: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.number,
    PropTypes.object,
  ]).isRequired,
  onChange: PropTypes.func.isRequired,
  currentRate: PropTypes.number.isRequired,
};
