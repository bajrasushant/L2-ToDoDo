// Purpose: controller of MVC pattern
import { catTodos } from './helpers.js';
import * as model from './model.js'
import { todoView, progressView, doneView } from './Views/boardView.js';
import  previewView from './Views/previewView.js';

const controlShowTodo = function() {
  const todos = catTodos();
  todoView.render(todos.todo);
  progressView.render(todos.progress);
  doneView.render(todos.done);
};

const init = function() {
    previewView.addHandlerRender(controlShowTodo);
};
init();
