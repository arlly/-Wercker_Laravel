import React, { Component } from 'react';
import PropTypes from 'prop-types';

const elem = document.getElementById('app');
const url = elem.getAttribute('data-url');

export default class BuyTopContent extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div>
        <div className="contentTopBnr">
          <h2 className="titleImage">
            <img src={`${url}/images/bnr_to_purchase_currency.png`} alt="外貨を購入する" />
          </h2>
          <p>リード文リード文リード文リード文リード文リード文リード文リード文リード文</p>
        </div>
        <div className="currentRateInfo">
          <p className="titleCurrentRate"><span>現在の外貨購入レート</span></p>
          <dl className="rateUpdateTime">
            <dt>最終更新時間：</dt>
            <dd>{this.props.updateTime}</dd>
          </dl>
        </div>
      </div>
    );
  }
}

BuyTopContent.propTypes = {
  updateTime: PropTypes.string.isRequired,
};
