import View from './View.js';
import previewView from './previewView.js';

class BoardView extends View {
    // _parentElement = document.querySelector('.todo--container, .progress--container, .done--container');
    _parentElement = document.querySelector('.project-tasks');
    _generateMarkup() {
        return this._data.map(result => previewView.render(result, false)).join('');
    }
}
container
export class TodoView extends BoardView {
    _parentElement = document.querySelector('.todo--container');
}
export class ProgressView extends BoardView {
    _parentElement = document.querySelector('.progress--container');
}
export class DoneView extends BoardView {
    _parentElement = document.querySelector('.done--container');
}

export const todoView = new TodoView();
export const progressView = new ProgressView();
export const doneView = new DoneView();
export const boardView = new BoardView();
