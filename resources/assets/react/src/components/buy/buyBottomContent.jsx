import React, { Component } from 'react';

const elem = document.getElementById('app');
const url = elem.getAttribute('data-url');

export default class BuyBottomContent extends Component {
  render() {
    return (
      <div className="buyBtmContent">
        <div className="infoArea">
          <div className="info">
            <p>下記レートは通販でのレートとなります。</p>
            <p>店舗レートとは異なりますのでご注意ください。</p>
          </div>
          <div className="info oneLine">
            <p>在庫確認は会員ログインが必要です。</p>
          </div>
        </div>
        <p>
          <a href="http://d-ranger.jp">
            <img src={`${url}/images/bnr_to_ticket_ranger.png`} alt="金券ショップ・格安チケットならチケットレンジャー" />
          </a>
        </p>
      </div>
    );
  }
}
