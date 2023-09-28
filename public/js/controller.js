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
import dropDownView from './Views/dropDownView.js';

const controlShowTodo = async function() {
  todoView.renderSpinner();
  progressView.renderSpinner();
  doneView.renderSpinner();
  await model.loadTodos();
  const todos = catTodos();
  console.log(todos);
  todoView.render(todos.todo);
  progressView.render(todos.progress);
  doneView.render(todos.done);
};

// const controlUpdateView = function() {
//   const todos = catTodos();
//   todoView.update(todos.todo);
//   progressView.update(todos.progress);
//   doneView.update(todos.done);
// };

const controlAddTodo = async function() {
  const todo = addTodoView.getTodo();
  if (!todo) return controlShowTodo();
  console.log(todo);
  try {
    await model.addTodoToState(todo);
  } catch (err) {
    console.error(err);
    throw err;
  }
  controlShowTodo();
};

const controlDeleteTodo = async function(id) {
  try {
    const indexToDel = model.state.todos.findIndex(el => el.id === +id);
    await model.removeTodoFromState(indexToDel);
  } catch (err) {
    console.error(err);
    throw err;
  };
  controlShowTodo();
}

const controlDragnDrop = async function(id, status) {
  const changeTodo = model.state.todos.findIndex(el => el.id === +id);
  try {
    await model.updateTodoStatus(changeTodo, status);
  } catch (err) {
    console.error(err);
    throw err;
  }
}

const controlEditTodo = async function(id, title, date) {
  const changeTodo = model.state.todos.findIndex(el => el.id === +id);
  try {
    await model.editTodo(changeTodo, title, date);
  } catch (err) {
    console.error(err);
    throw err;
  }
  controlShowTodo();
};

const controlDropDown = async function() {
	await model.loadProjects();
	dropDownView.populatedDropDown(model.state.projects);
};

const init = function() {
  previewView.addHandlerRender(controlShowTodo);
  addTodoView.addHandlerClick(controlAddTodo);
  deleteTodoView.addHandlerDelete(controlDeleteTodo);
  dragDropView.addHandlerDragOver(controlDragnDrop);
  sidebarView.toggleSidebar();
  editTodoView.addHandlerEdit(controlEditTodo);
	controlDropDown();
};
init();
