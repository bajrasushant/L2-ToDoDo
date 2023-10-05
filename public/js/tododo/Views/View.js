export default class View {
    _data;
    render(data, render = true) {
        this._data = data;
        const markup = this._generateMarkup();
        if (!render) return markup;
        this._clear();
        this._parentElement.insertAdjacentHTML('beforeend', markup);
    }

    _clear() {
        this._parentElement.innerHTML = '';
    }

    renderSpinner() {
        const markup = `
      <div class="spinner">
        <svg>
          <use href="../../img/icons.svg#icon-loader"></use>
        </svg>
      </div>
    `;
        this._clear();
        this._parentElement.insertAdjacentHTML('afterbegin', markup);
    };

    // update(data) {
    //     this._data = data;
    //     const newMarkup = this._generateMarkup();
    //     const newDOM = document.createRange().createContextualFragment(newMarkup);
    //     const newElements = Array.from(newDOM.querySelectorAll('*'));
    //     const curElements = Array.from(this._parentElement.querySelectorAll('*'));
    //     newElements.forEach((newEl, i) => {
    //         const curEl = curElements[i];
    //         if (!newEl.isEqualNode(curEl) && newEl.firstChild.nodeValue && newEl.firstChild.nodeValue.trim() !== '') {
    //             curEl.textContent = newEl.textContent;
    //         }
    //         if (!newEl.isEqualNode(curEl)) {
    //             Array.from(newEl.attributes).forEach(attr => curEl.setAttribute(attr.name, attr.value));
    //           if(newEl.nodeName === 'TIME') {
    //             const textNode = newEl.childNodes[1];
    //             if(textNode.nodeType === Node.TEXT_NODE) {
    //               curEl.childNodes[1].textContent = textNode.textContent;
    //             }
    //           }
    //         }
    //     }
    //     );
    // };
}
