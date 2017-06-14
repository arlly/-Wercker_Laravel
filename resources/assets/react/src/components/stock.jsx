import React, { Component } from 'react';
import PropTypes from 'prop-types';
import axios from 'axios';
import _ from 'lodash';

const url = document.getElementById('app').getAttribute('data-url');

export default class Stock extends Component {
  constructor(props) {
    super(props);
    this.state = {
      balanceBillSet: [],
      billSet: [],
      status: 0,
      orderPrice: 0,
      stockprice: 0,
    };

    this.onClose = this.onClose.bind(this);
    this.fetchStocks = this.fetchStocks.bind(this);
    this.fetchStocks();
  }

  shouldComponentUpdate(nextProps, nextState) {
    return (this.state.status !== nextState.status);
  }

  onClose() {
    this.props.handleModal(false);
  }

  addCart(type) {
    const billList = this.processingBill(type);
    const apiUrl = `${url}/WebAPI/BuyCart/addCart`;
    axios.post(apiUrl, {
      bill: billList,
      orderPrice: this.state.orderPrice,
      currencyId: this.props.data.currencyId,
    }, this.props.config)
      .then((response) => {
        console.log(response.data);
        const result = Object.prototype.hasOwnProperty
                        .call(response, 'data')
                        ? response.data : [];
        this.onClose();
        if (result.length > 0) {
          this.props.handleCart(result);
        }
      })
      .catch((error) => {
        console.log(error);
      });
  }

  fetchStocks(foreignCurrency = 0) {
    const currency = (foreignCurrency > 0) ? foreignCurrency : this.props.data.foreignCurrency;
    const apiUrl = `${url}/WebAPI/Distribution/get/${this.props.data.currencyId}`;
    axios.post(apiUrl, {
      orderPrice: currency,
    }, this.props.config)
      .then((response) => {
        console.log(response);
        this.setState({
          balanceBillSet: response.data.BalanceBillSet,
          billSet: response.data.billSet,
          status: response.status,
          orderPrice: response.data.orderPrice,
          stockprice: response.data.stockPrice,
        });
      })
      .catch((error) => {
        console.log(error);
      });
  }

  processingBill(type) {
    let bill = null;
    const billList = {};
    if (type === 'billSet') {
      bill = this.state.billSet;
    } else if (type === 'balanceBillSet') {
      bill = this.state.balanceBillSet;
    }
    _.map(bill, (stock, key) => {
      billList[key] = stock.amount;
    });
    return billList;
  }

  balanceList() {
    return _.map(this.state.balanceBillSet, (stock, key) => (
      <dl key={key}>
        <dt>{stock.name}{this.props.data.currencyName} ×</dt>
        <dd>{stock.amount}枚</dd>
      </dl>
    ));
  }

  minimumList() {
    return _.map(this.state.billSet, (stock, key) => (
      <dl key={key}>
        <dt>{stock.name} {this.props.data.currencyName} ×</dt>
        <dd>{stock.amount}枚</dd>
      </dl>
    ));
  }

  inStock() {
    return (
      <div className="stockCheckContent">
        <p className="message">
          在庫の確認がとれました。<br />
          どちらの組み合わせでご購入するかをお選びください。
        </p>
        <dl className="desiredAmount">
          <dt>ご購入希望金額：</dt>
          <dd>{this.props.data.foreignCurrency} {this.props.data.currencyName}</dd>
        </dl>
        <div className="result">
          <div className="minimum">
            <p>最小枚数構成</p>
            {this.minimumList()}
            <p className="add">
              <button className="button-add" onClick={() => { this.addCart('billSet'); }}>カートに入れる</button>
            </p>
          </div>
          <div className="balance">
            <p>バランス構成</p>
            {this.balanceList()}
            <p className="add">
              <button className="button-add" onClick={() => { this.addCart('balanceBillSet'); }}>カートに入れる</button>
            </p>
          </div>
        </div>
        <p><button onClick={this.onClose}>購入しない</button></p>
      </div>
    );
  }

  outStock() {
    return (
      <div className="stockCheckContent">
        <p className="message">
          お客様のご購入希望金額での在庫確保ができませんでした。<br />
          現在、次の金額でのご購入が可能です。
        </p>
        <div>
          <dl className="amount desired">
            <dt>ご購入希望金額：</dt>
            <dd>{this.props.data.foreignCurrency} {this.props.data.currencyName}</dd>
          </dl>
        </div>
        <div>
          <dl className="amount possible">
            <dt>ただいまのご購入可能金額：</dt>
            <dd>{this.state.stockprice} {this.props.data.currencyName}</dd>
          </dl>
          <p className="purchase">
            <button
              className="button-purchase"
              onClick={() => {
                this.fetchStocks(this.state.stockprice);
                if (this.state.stockprice > 0) {
                  this.props.handleChange({
                    foreignCurrency: this.state.stockprice,
                    currencyId: this.props.data.currencyId,
                    currencyName: this.props.data.currencyName,
                  });
                }
              }}
            >
              この金額分で購入する
            </button>
          </p>
        </div>
        <p><button className="button-close" onClick={this.onClose}>購入しない</button></p>
        <p className="">予約購入は発送まで2〜3営業日必要です。</p>
        <div className="inquiry">
          <p>外貨のご購入に関してのご相談・お問合せはお電話にてご連絡ください。</p>
          <p><span className="phone">03-3571-6036</span>まで(営業時間10:00〜20:00)</p>
        </div>
      </div>
    );
  }

  renderContent() {
    if (this.state.status === 200) {
      return (this.inStock());
    } else if (this.state.status === 299) {
      return (this.outStock());
    }
    return false;
  }

  render() {
    return (this.renderContent());
  }

}

Stock.propTypes = {
  data: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object,
  ]).isRequired,
  config: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object,
  ]).isRequired,
  handleModal: PropTypes.func.isRequired,
  handleCart: PropTypes.func.isRequired,
  handleChange: PropTypes.func.isRequired,
};
