import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: [{
            // this alias it to allow us to include fontello icons
            find: 'bootstrap-icons',
            replacement: path.resolve(__dirname, 'node_modules/bootstrap-icons'),
        }],
    },
});

