import { AJAX } from './helpers.js';
import { API_URL } from './config.js';

export const state = {
    todos: [],
};

const createTodoObject = function(todo) {
    return {
        id: todo.id,
        title: todo.title,
        createdAt: new Date(todo.created_at),
        updatedAt: new Date(todo.updated_at),
        status: todo.status,
        deadline: new Date(todo.deadline),
        tag: todo.tag,
    }
}

const storeTodos = function(data) {
    return data.map(todo => createTodoObject(todo));
}

export const loadTodos = async function() {
    try {
        const data = await AJAX(`${API_URL}`);
        state.todos = storeTodos(data.data);
    } catch (err) {
        console.error(err);
        throw err;
    }
}

export const addTodoToState = async function(todo) {
    try {
        const data = await AJAX(`${API_URL}`, todo, 'POST');
        state.todos.push(data.data);
        return state.todos;
    } catch (err) {
        console.error(err);
        throw err;
    }
}

export const removeTodoFromState = async function(index) {
    try {
        await AJAX(`${API_URL}/${state.todos[index].id}`, undefined, 'DELETE');
        state.todos.splice(index, 1);
        return state.todos;
    } catch (err) {
        console.error(err);
        throw err;
    }
}

export const updateTodoStatus = async function(index, status) {
    try {
       await AJAX(`${API_URL}/${state.todos[index].id}`, { status }, 'PATCH');
        state.todos[index].status = status;
        return state.todos;
    } catch (err) {
        console.error(err);
        throw err;
    }
}

export const editTodo = async function(index, title, date) {
    try {
        await AJAX(`${API_URL}/${state.todos[index].id}`, { title, deadline: date }, 'PUT');
        state.todos[index].title = title;
        state.todos[index].deadline = date;
        return state.todos;
    } catch (err) {
        console.error(err);
        throw err;
    }
};
