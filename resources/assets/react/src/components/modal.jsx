import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Animate } from 'react-move';

export default class Modal extends Component {
  constructor(props) {
    super(props);
    this.state = {
      opacity: 1,
    };
    this.closeModal = this.closeModal.bind(this);
  }

  onClose() {
    this.props.handleModal(false);
  }

  closeModal() {
    const self = this;
    setTimeout(() => {
      self.setState({
        opacity: 0,
      });
      self.onClose();
    }, 100);
  }

  renderContent(data) {
    const component = this.props.component;
    return (
      <div
        className="overlay"
        onClick={() => { this.closeModal(); }}
        role="button"
        style={{
          opacity: `${data.opacity}`,
        }}
      >
        <div
          className="modal"
          onClick={(e) => { e.stopPropagation(); }}
          role="button"
          style={{
            opacity: `${data.opacity}`,
          }}
        >
          {React.createElement(component, {
            data: this.props.data,
            handleModal: this.props.handleModal,
            config: this.props.config,
            handleCart: this.props.handleCart,
            handleChange: this.props.handleChange })}
        </div>
      </div>
    );
  }

  renderModal() {
    return (
      <Animate
        default={{
          opacity: 0,
        }}
        data={{
          opacity: this.state.opacity,
        }}
      >
        {data => (
          this.renderContent(data)
        )}
      </Animate>
    );
  }

  render() {
    return (this.renderModal());
  }
}

Modal.propTypes = {
  data: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object,
  ]).isRequired,
  config: PropTypes.oneOfType([
    PropTypes.string,
    PropTypes.object,
  ]).isRequired,
  component: PropTypes.func.isRequired,
  handleModal: PropTypes.func.isRequired,
  handleCart: PropTypes.func.isRequired,
  handleChange: PropTypes.func.isRequired,
};
