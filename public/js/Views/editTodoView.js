import { getTodo } from "../helpers.js";
class EditTodoView {
  _parentElement = document.querySelector('.project');
  _editContainer = document.querySelector('.edit-confirm__container');
  _cancelBtn = document.querySelector('.cancel-edit__btn');
  _closeBtn = document.querySelector('.edit-close-button');
  _confirmEditBtn = document.querySelector('.confirm-edit__btn');
  _overlay = document.getElementById('editOverlay');
  _editTitleInput = document.querySelector('.edit-title-input');
  _editCalendar = document.querySelector('.edit-calendar');

  constructor() {
    this._addHandlerHideWindow();
  }

  addHandlerEdit(handler) {
    let editTodoId;
    this._parentElement.addEventListener('click', function(e){
      const btn = e.target.closest('.task__edit');
      if (!btn) return;
      editTodoId = (btn.id.split('_')[1]);
        console.log(editTodoId);
      // console.log(editTodoId)

      // // Get the title of the corresponding todo
      // const todoToEdit = model.todos.find(todo => todo.id === editTodoId);
      // // console.log(todoToEdit)

      // Get todo
      const todoToEdit = getTodo(editTodoId);
      this._editTitleInput.textContent = todoToEdit.title;
      this._editCalendar.value = new Date(todoToEdit.deadline).toISOString().split('T')[0];

      this._toggleConfirmActive();
    }.bind(this)); // use bind or else use an arrow function
    this._confirmEditBtn.addEventListener('click', () => {
      const newTitle = this._editTitleInput.textContent;
      const newDate = new Date(this._editCalendar.value);
        const currentDate = new Date();
        if (newDate.setHours(0,0,0,30) < currentDate.setHours(0,0,0,30)) {
            alert('Please select a date in the future');
            return;
        }
      this._toggleConfirmActive();
      handler(editTodoId, newTitle, newDate);
    });
  }

  _addHandlerHideWindow() {
    this._cancelBtn.addEventListener('click', this._toggleConfirmActive.bind(this));
    this._closeBtn.addEventListener('click', this._toggleConfirmActive.bind(this));
    this._overlay.addEventListener('click', this._toggleConfirmActive.bind(this));
  }

  _toggleConfirmActive() {
    this._editContainer.classList.toggle('active');
    this._overlay.classList.toggle('active');
  }

}
export default new EditTodoView();
