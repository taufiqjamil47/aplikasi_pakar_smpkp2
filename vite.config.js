import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/ppdb/app.css',
                'resources/css/auth/auth.css',
                'resources/css/home/welcome.css',
                'resources/css/attendance/app.css',
                'resources/css/attendance/absence.css',
                // 'resources/css/cdn/toastr.min.css',
                'resources/js/ppdb/app.js',
                'resources/js/home/welcome.js',
                // 'resources/js/cdn/toastr.min.js',
                'resources/js/auth/auth.js',
                'resources/js/attendance/app.js',
                'resources/js/attendance/absence.js',
            ],
            refresh: true,
        }),
    ],
    // optimizeDeps: {
    //     include: ['toastr'],
    //     exclude: ['toastr']
    // },
    // build: {
    //     sourcemap: false // or set to true if you want sourcemaps for your own code
    // }
    // server: {
    //     host: '192.168.100.51',
    //     port: 3000,
    //     cors: true,
    // },
});
