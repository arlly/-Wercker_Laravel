import React, { Component } from 'react';
import PropTypes from 'prop-types';
import Cart from './cart';

export default class Sidebar extends Component {
  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="side">
        <Cart
          config={this.props.config}
          handleModal={this.props.handleModal}
          handleCart={this.props.handleCart}
          data={this.props.data}
        />
        <div className="side-widget">
          <div className="so-widget-sow-image so-widget-sow-image-default-3f547a15eaaa">
            <div className="sow-image-container">
              <a href="https://d-ranger.jp/">
                <img src="https://d-ranger.jp/wp-content/uploads/2017/05/c4379e75045f32246d24c17cf2db185f.png" width="240" height="183" srcSet="" title="店頭での両替はこちら" alt="店頭での両替はこちら" className="so-widget-image" />
              </a>
            </div>
          </div>
        </div>
        <div className="side-widget">
          <nav className="currencyNavi currencyNavi-buy">
            <h1 className="currencyNavi-title toggle-button is-active">
              <img src="https://d-ranger.jp/wp-content/themes/dollarranger/img/side_navi_header_buy01@2x.png" width="230" alt="外貨を購入する" />
            </h1>
            <ul className="currencyNavi-inner toggle-target is-open">
              <li className="currencyNavi-item">
                <a className="currencyNavi-USD" href="">USD アメリカドル</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-USD" href="">USD アメリカドル</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-USD" href="">USD アメリカドル</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-USD" href="">USD アメリカドル</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-USD" href="">USD アメリカドル</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-USD" href="">USD アメリカドル</a>
              </li>
              <li className="currencyNavi-item">
                <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
              </li>
            </ul>
          </nav>
        </div>
        <div className="side-widget" > <nav className="currencyNavi currencyNavi-sell">
          <h1 className="currencyNavi-title toggle-button is-active">
            <img src="https://d-ranger.jp/wp-content/themes/dollarranger/img/side_navi_header_sell01@2x.png" width="230" alt="外貨を売却する" />
          </h1>
          <ul className="currencyNavi-inner toggle-target is-open">
            <li className="currencyNavi-item">
              <a className="currencyNavi-USD" href="">USD アメリカドル</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-USD" href="">USD アメリカドル</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-USD" href="">USD アメリカドル</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-USD" href="">USD アメリカドル</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-USD" href="">USD アメリカドル</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-USD" href="">USD アメリカドル</a>
            </li>
            <li className="currencyNavi-item">
              <a className="currencyNavi-EUR" href="">EUR ユーロ</a>
            </li>
          </ul>
        </nav>
        </div>
        <div className="side-widget">
          <div className="so-widget-sow-image so-widget-sow-image-default-3f547a15eaaa">
            <div className="sow-image-container">
              <a href="http://dollar-ranger-wp.n-di.net/%e5%a4%96%e8%b2%a8%e4%b8%a1%e6%9b%bf%e3%83%89%e3%83%ab%e3%83%ac%e3%83%b3%e3%82%b8%e3%83%a3%e3%83%bc%e3%81%ae%e3%81%93%e3%81%93%e3%81%8c%e3%82%b9%e3%82%b4%e3%82%a4/">
                <img src="https://d-ranger.jp/wp-content/uploads/2017/05/a8a33a6f4016c508c6fafab852bc3461.png" width="240" height="100" srcSet="" title="ドルレンジャーのここがスゴイ！" alt="ドルレンジャーのここがスゴイ！" className="so-widget-image" />
              </a>
            </div>
          </div>
        </div>
        <div className="side-widget">
          <div className="so-widget-sow-image so-widget-sow-image-default-3f547a15eaaa">
            <div className="sow-image-container">
              <a href="http://dollar-ranger-wp.n-di.net/top/">
                <img src="https://d-ranger.jp/wp-content/uploads/2017/05/ce8eb06fec32d4c6900c5d18fe832c23.png" width="240" height="40" srcSet="" title="ただいまの両替レート" alt="ただいまの両替レート" className="so-widget-image" />
              </a>
            </div>
          </div>
        </div>
        <div className="side-widget">
          <div className="so-widget-sow-image so-widget-sow-image-default-3f547a15eaaa">
            <div className="sow-image-container">
              <a href="http://dollar-ranger-wp.n-di.net/guide/">
                <img src="https://d-ranger.jp/wp-content/uploads/2017/05/de5045ed0d67f5dc6da4b02812ac4f75.png" width="240" height="40" srcSet="" title="ご利用ガイド" alt="ご利用ガイド" className="so-widget-image" />
              </a>
            </div>
          </div>
        </div>
        <div className="side-widget">
          <div className="so-widget-sow-image so-widget-sow-image-default-3f547a15eaaa">
            <div className="sow-image-container">
              <a href="http://dollar-ranger-wp.n-di.net/business/">
                <img src="https://d-ranger.jp/wp-content/uploads/2017/05/bee881ebd411b7d2ca7d5bc84e4f818e.png" width="240" height="40" srcSet="" title="大口・法人のお客様" alt="大口・法人のお客様" className="so-widget-image" />
              </a>
            </div>
          </div>
        </div>
        <div className="side-widget">
          <div className="so-widget-sow-image so-widget-sow-image-default-3f547a15eaaa">
            <div className="sow-image-container">
              <a href="/feedback/">
                <img src="https://d-ranger.jp/wp-content/uploads/2017/05/fec89fa4b748427a1204bc7e318de55e.png" width="240" height="40" srcSet="" title="お客様の声" alt="お客様の声" className="so-widget-image" />
              </a>
            </div>
          </div>
        </div>
        <div className="side-widget">
          <div className="so-widget-sow-image so-widget-sow-image-default-3f547a15eaaa">
            <div className="sow-image-container">
              <img src="https://d-ranger.jp/wp-content/uploads/2017/05/d3ac2a68ccf6c47590c3dcc6ba1a7fa1.png" width="240" height="40" srcSet="" title="よくあるご質問" alt="よくあるご質問" className="so-widget-image" />
            </div>
          </div>
        </div>
        <div className="side-widget">
          <div className="so-widget-sow-image so-widget-sow-image-default-3f547a15eaaa">
            <div className="sow-image-container">
              <a href="http://dollar-ranger-wp.n-di.net/contactus/">
                <img src="https://d-ranger.jp/wp-content/uploads/2017/05/0aa844d931a7e8c8704c6aa33605ed7e.png" width="240" height="40" srcSet="" title="お問い合わせ" alt="お問い合わせ" className="so-widget-image" />
              </a>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

Sidebar.propTypes = {
  config: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object,
  ]).isRequired,
  handleModal: PropTypes.func.isRequired,
};
