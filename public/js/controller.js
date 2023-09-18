// Purpose: controller of MVC pattern
import * as model from './model.js';
import { catTodos } from './helpers.js';
import { todoView, progressView, doneView } from './Views/boardView.js';
import previewView from './Views/previewView.js';
import addTodoView from './Views/addTodoView.js';
import deleteTodoView from './Views/deleteTodoView.js';
import dragDropView from './Views/dragDropView.js';
import sidebarView from './Views/sidebarView.js';
import editTodoView from './Views/editTodoView.js';

const controlShowTodo = async function() {
    todoView.renderSpinner();
    progressView.renderSpinner();
    doneView.renderSpinner();
    await model.loadTodos();
    const todos = catTodos();
    todoView.render(todos.todo);
    progressView.render(todos.progress);
    doneView.render(todos.done);
};

const controlAddTodo = function() {
    const todo = addTodoView.getTodo();
    if (!todo) return controlShowTodo();
    console.log(todo);
    try {
        model.addTodoToState(todo);
    } catch (err) {
        console.error(err);
    }
    controlShowTodo();
};

const controlDeleteTodo = function(id) {
    try {
        const indexToDel = model.state.todos.findIndex(el => el.id === +id);
        model.removeTodoFromState(indexToDel);
    } catch(err) {
        console.error(err);
    };
    controlShowTodo();
}

const controlDragnDrop = function(id, status) {
    const changeTodo = model.state.todos.findIndex(el => el.id === +id);
    try {
        model.updateTodoStatus(changeTodo, status);
    } catch(err) {
        console.error(err);
    }
}

const controlEditTodo = function(id, title, date) {
    const changeTodo = model.state.todos.findIndex(el => el.id === +id);
    try {
        model.editTodo(changeTodo, title, date);
    } catch(err) {
        console.error(err);
    }
    controlShowTodo();
};

const init = function() {
    previewView.addHandlerRender(controlShowTodo);
    addTodoView.addHandlerClick(controlAddTodo);
    deleteTodoView.addHandlerDelete(controlDeleteTodo);
    dragDropView.addHandlerDragOver(controlDragnDrop);
    sidebarView.toggleSidebar();
    editTodoView.addHandlerEdit(controlEditTodo);
};
init();
