import React, { Component } from 'react';
import axios from 'axios';
import PropTypes from 'prop-types';
import CurrencyFormItem from './currencyFormItem';
import BuyTopContent from './buy/buyTopContent';
import BuyBottomContent from './buy/buyBottomContent';

const url = document.getElementById('app').getAttribute('data-url');
const apiPath = '/WebAPI/Rate/get';

export default class CurrencyFormList extends Component {
  constructor(props) {
    super(props);
    this.state = {
      currencies: [],
      lastUpdate: '',
    };

    this.fetchCurrencyRates();
  }

  fetchCurrencyRates() {
    const apiUrl = url + apiPath;
    axios.get(apiUrl, this.props.config)
      .then((response) => {
        console.log(response);
        this.setState({
          currencies: response,
          lastUpdate: response.data.lastUpdate.date,
        });
      })
      .catch((error) => {
        console.log(error);
      });
  }

  renderCurrencyHead() {
    if (this.props.page === 'detail') {
      return (
        <tr>
          <th>&nbsp;</th>
          <th>オンラインレート</th>
          <th>購入希望金額</th>
        </tr>
      );
    }
    return (
      <tr>
        <th>&nbsp;</th>
        <th>オンラインレート</th>
        <th>他社レート</th>
        <th>購入希望金額</th>
      </tr>
    );
  }

  renderCurrencyList() {
    if (Object.prototype.hasOwnProperty.call(this.state.currencies, 'data')) {
      return this.state.currencies.data.rate.map(currency => (
        <CurrencyFormItem
          key={currency.currency_key}
          currency={currency}
          handleChange={this.props.handleChange}
          handleModal={this.props.handleModal}
          foreignCurrency={this.props.foreignCurrency}
          page={this.props.page}
        />
      ));
    }
    return [];
  }

  render() {
    return (
      <div className="currency-form">
        <BuyTopContent updateTime={this.state.lastUpdate} />
        <form className="calculationForm">
          <table>
            <thead>
              {this.renderCurrencyHead()}
            </thead>
            <tbody>
              {this.renderCurrencyList()}
            </tbody>
          </table>
        </form>
        <BuyBottomContent />
      </div>
    );
  }
}

CurrencyFormList.propTypes = {
  foreignCurrency: PropTypes.number.isRequired,
  handleModal: PropTypes.func.isRequired,
  handleChange: PropTypes.func.isRequired,
  page: PropTypes.string.isRequired,
  config: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object,
  ]).isRequired,
};
