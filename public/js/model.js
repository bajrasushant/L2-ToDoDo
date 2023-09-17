export const state = {
    todos: [],
};

export const loadTodos = async function() {
    try {
        const res = await fetch('http://localhost:8000/api/todos');
        const data = await res.json();
        state.todos = data.data.map(todo => createTodoObject(todo));
    } catch (err) {
        console.error(err);
    }
}

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

export const addTodoToState = async function(todo) {
    try {
        const res = await fetch('http://localhost:8000/api/todos', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(todo),
        });

        if(!res.ok) throw new Error('Could not add todo');
        const data = await res.json();
        console.log('Todo created', data);
    } catch (err) {
        console.error(err);
    }
}

export const removeTodoFromState = async function(index) {
    try {
        const res = await fetch(`http://localhost:8000/api/todos/${state.todos[index].id}`, {
            method: 'DELETE',
        });
        if(!res.ok) throw new Error('Could not delete todo');
        const data = await res.json();
        console.log('Todo deleted', data);
    } catch (err) {
        console.error(err);
    }
}
