import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/css/inter.css',
            'resources/css/filament/admin/theme.css',
            'resources/js/app.js',
        ]),
    ],
});