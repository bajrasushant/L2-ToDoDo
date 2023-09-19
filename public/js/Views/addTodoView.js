import View from "./View.js";

class AddTodoView extends View {
    _parentElement = document.querySelector('.add-todo-container');
    _addTodoButton = document.getElementById("add__todo-btn");
    _underlay = document.querySelector('.underlay');
    _createTodo = document.querySelector('.create__todo-btn');
    _plusBtn = document.querySelector('#todo__plus-btn');

    constructor() {
        super();
        this._addHandlerShowAddTodo();
    };

    _clearInput() {
        this._parentElement.querySelector('#todo-desc').value = '';
        this._parentElement.querySelector('#deadline-date').value = '';
    };

    _createCloseBtn() {
        this._plusBtn.innerHTML = '';
        this._plusBtn.innerText = 'close';
        this._plusBtn.classList.remove('add');
        this._plusBtn.style.color = "rgb(248 113 113)";
    }

    _createAddBtn() {
        this._plusBtn.innerHTML = '';
        this._plusBtn.innerText = 'add';
        this._plusBtn.classList.add('add');
        this._plusBtn.style.color = 'var(--light-grey)';
    }

    _toggleAddTodo() {
        this._plusBtn.classList.contains('add') ? this._createCloseBtn() : this._createAddBtn();
        this._underlay.classList.toggle('hidden');

    };

    _addHandlerShowAddTodo() {
        this._addTodoButton.addEventListener('click', this._toggleAddTodo.bind(this));
    }


    getTodo() {
        const title = this._parentElement.querySelector('#todo-desc').value;
        const currentDate = new Date();
        const deadline = new Date(this._parentElement.querySelector('#deadline-date').value);
        const roughDeadline = deadline.setHours(0, 0, 0, 30);
        this._clearInput();
        this._toggleAddTodo();
        if (!title) return;
        if (currentDate.setHours(0, 0, 0, 30) <= roughDeadline && currentDate) {
            return {
                title: title,
                deadline: deadline,
                tag: 'Practice',
                status: 'todo',
                createdAt: new Date().getTime(),
            }
        }
        console.error('Date in Past');
        return;
    }

    addHandlerClick(handler) {
        this._createTodo.addEventListener('click', handler);
    }
};
export default new AddTodoView();
