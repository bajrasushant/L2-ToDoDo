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

export const getTodo = function(id) {
    return model.state.todos.find(el => el.id === +id);
}

export const getProjectName = function(id) {
	return model.state.projects.find(project => project.id === id).name;
};


export const AJAX = async function(url, uploadData = undefined, method='GET') {
    try {
        const options = {
            method,
            headers: {
                'Content-Type': 'application/json',
            },
            body: uploadData ? JSON.stringify(uploadData): undefined,
        };
        const fetchPro =  fetch(url, options);

        const res = await fetchPro;

        if (!res.ok) throw new Error(`${data.message} (${res.status})`);
        const data = await res.json();

        return data;
    } catch (err) {
        throw err;
    }
}
