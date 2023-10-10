import View from './View.js';
class RenderMessageView extends View {
	_parentElement = document.querySelector('.message');

	renderError(message) {
		const markup = `
		<div class="alert error">
		${message}
		</div>
		`;
		this._clear();
		this._parentElement.insertAdjacentHTML('afterbegin', markup);
	}

	renderMessage(message) {
		const markup = `
		<div class="alert success">
		${message}
		</div>
		`;
		this._clear();
		this._parentElement.insertAdjacentHTML('afterbegin', markup);
	}
}

export default new RenderMessageView();
