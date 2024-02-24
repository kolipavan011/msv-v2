import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    build: {
        outDir: './public_html/build/'
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/js/script.js',
                'resources/scss/app.scss',
                'resources/scss/style.scss',
            ],
            publicDirectory: "public_html",
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
});
