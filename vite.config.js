import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/ppdb/app.css',
                'resources/css/auth/auth.css',
                'resources/css/home/welcome.css',
                'resources/css/cdn/toastr.min.css',
                'resources/js/ppdb/app.js',
                'resources/js/auth/auth.js',
                'resources/js/home/welcome.js',
                'resources/js/cdn/toastr.min.js',
            ],
            refresh: true,
        }),
    ],
    // server: {
    //     host: '192.168.100.72',
    //     port: 3000
    // },
});
