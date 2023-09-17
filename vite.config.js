import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css',
                'resources/css/todo.css',
                'resources/js/controller.js'],
            refresh: true,
        }),
    ],
});
