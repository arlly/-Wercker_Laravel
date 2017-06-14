import React, { Component } from 'react';
import PropTypes from 'prop-types';
import _ from 'lodash';
import CurrencyCalculation from './currencyCalculation';

const url = document.getElementById('app').getAttribute('data-url');

export default class CurrencyFormItem extends Component {
  constructor(props) {
    super(props);
  }

  getAmount() {
    const amounts = [];
    _.each(this.props.currency.buy.d_ranger, (val, key) => {
      amounts.push(key);
    });
    return amounts;
  }

  getNextAmount() {
    const amount = _(this.getAmount());
    amount.next();
    return amount;
  }

  getCurrencyId() {
    const param = location.href;
    return Number(param.slice(-1));
  }

  processingCurrency() {
    let rate = 0;
    const foreignCurrency = this.props.foreignCurrency;
    const dRenger = this.getNextAmount();
    _.each(this.props.currency.buy.d_ranger, (val) => {
      if (dRenger.next().value > foreignCurrency && foreignCurrency > 0) {
        rate = val;
        return false;
      } else if (foreignCurrency === 0) {
        rate = val;
        return false;
      }
      rate = val;
      return true;
    });
    return rate;
  }

  renderCurrencyItem() {
    let currencyRate = 0;
    _.each(this.props.currency.buy.d_ranger, (val) => {
      currencyRate = val;
      return false;
    });

    return (
      <tr>
        <th>
          <div className="currencyImageContainer">
            <p className="currencyImage">
              <img src={`${url}/images/img_flag_${this.props.currency.currency_key}.png`} width="89" alt={`${this.props.currency.currency_name}`} />
            </p>
          </div>
        </th>
        <td>
          <p className="onlineRate">
            <span className="currencyRate">{currencyRate}</span>円
          </p>
        </td>
        <td>
          <div className="competitorRateArea">
            <dl className="competitorRate sideBySide">
              <dt>
                <p className="otherCompany">大手銀行</p>
              </dt>
              <dd>
                {this.props.currency.buy.bank}円<br />
                <span className="red bold">
                  {(this.props.currency.buy.bank - currencyRate).toFixed(2)}円お得
                </span>
              </dd>
            </dl>
            <dl className="competitorRate sideBySide">
              <dt>
                <p className="otherCompany">大手金券商</p>
              </dt>
              <dd>
                {this.props.currency.buy.exchange}円<br />
                <span className="red bold">
                  {(this.props.currency.buy.exchange - currencyRate).toFixed(2)}円お得
                </span>
              </dd>
            </dl>
            <dl className="competitorRate sideBySide">
              <dt>
                <p className="otherCompany">大手両替商</p>
              </dt>
              <dd>
                {this.props.currency.buy.ticket_shop}円<br />
                <span className="red bold">
                  {(this.props.currency.buy.ticket_shop - currencyRate).toFixed(2)}円お得
                </span>
              </dd>
            </dl>
          </div>
        </td>
        <td>
          <CurrencyCalculation
            currency={this.props.currency}
            currentRate={currencyRate}
            onChange={this.props.handleChange}
          />
          <p className="confirmBtn">
          {isLogin ?
            (
              <button
                type="submit"
                className="button-type02 button-rounded button-arrow button-default"
                onClick={(e) => {
                  e.preventDefault();
                  (this.props.foreignCurrency > 0) && this.props.handleModal(true);
                }}
              >
                紙幣組み合わせを確認
              </button>
            ) : (
              <a
                href="auth/login"
                className="button-type01 button-rounded button-arrow button-default"
              >
                会員ログインして確認
              </a>
            )
          }
          </p>
        </td>
      </tr>
    );
  }

  renderDetailRate() {
    const amount = this.getNextAmount();
    return _.map(this.props.currency.buy.d_ranger, (rate, key) => (
      <div className="rateDetail" key={rate}>
        <p className="amount">
          {(() => {
            const value = amount.next().value;
            if (value !== undefined) {
              return (`${key}〜${(value - 1)}`);
            }
            return (`${key}〜`);
          })()}
        </p>
        <p className="onlineRate">
          <span className="currencyRate">{rate}</span>円
        </p>
      </div>
    ));
  }

  renderCurrencyItemDetail() {
    if (this.props.currency.currency_id === this.getCurrencyId()) {
      const currency = this.processingCurrency();
      return (
        <tr>
          <th>
            <div className="currencyImageContainer">
              <p className="currencyImage">
                <img src={`${url}/images/img_flag_${this.props.currency.currency_key}.png`} width="89" alt={`${this.props.currency.currency_name}`} />
              </p>
            </div>
          </th>
          <td>
            {this.renderDetailRate()}
          </td>
          <td>
            <CurrencyCalculation
              currency={this.props.currency}
              currentRate={currency}
              onChange={this.props.handleChange}
            />
            <p className="confirmBtn">
              {
                (isLogin) ? (
                  <button
                    type="submit"
                    className="button-type02 button-rounded button-arrow button-default"
                    onClick={(e) => {
                      e.preventDefault();
                      (this.props.foreignCurrency > 0) && this.props.handleModal(true);
                    }}
                  >
                    紙幣組み合わせを確認
                  </button>
                ) : (
                  <a
                    href="auth/login"
                    className="button-type01 button-rounded button-arrow button-default"
                  >
                    会員ログインして確認
                  </a>
                )
              }
            </p>
          </td>
        </tr>
      );
    }
    return null;
  }

  render() {
    return (
    (this.props.page === 'detail') ?
      this.renderCurrencyItemDetail() :
      this.renderCurrencyItem()
    );
  }
}

CurrencyFormItem.propTypes = {
  currency: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.number,
    PropTypes.object,
  ]).isRequired,
  foreignCurrency: PropTypes.number.isRequired,
  handleModal: PropTypes.func.isRequired,
  handleChange: PropTypes.func.isRequired,
  page: PropTypes.string.isRequired,
};
