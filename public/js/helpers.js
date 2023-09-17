import * as model from './model.js';

export const catTodos = function() {
    const filterAndSort = (todos, status) => {
        return todos
            .filter(el => el.status === status)
            .sort((a, b) => b.id - a.id);
    };

    const todo = filterAndSort(model.state.todos, 'todo');
    const progress = filterAndSort(model.state.todos, 'progress');
    const done = filterAndSort(model.state.todos, 'done');

    return { todo, progress, done };
}
