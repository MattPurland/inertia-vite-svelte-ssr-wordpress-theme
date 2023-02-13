import { defineConfig } from 'vite'
import { svelte } from "@sveltejs/vite-plugin-svelte"
import { resolve } from 'path'

import laravel from 'laravel-vite-plugin'
import sveltePreprocess from 'svelte-preprocess'

const production = process.env.NODE_ENV === 'production'
const projectRootDir = resolve(__dirname);

export default defineConfig({
    plugins: [
        laravel.default({
            publicDirectory: '.',
            input: [
                // 'resources/sass/app.scss'
                'src/js/app.js'
            ],
            ssr: 'src/js/ssr.js',
            ssrOutputDirectory: 'build/ssr',
            refresh: true
        }),
        svelte({
            preprocess: sveltePreprocess({
                includePaths: [
                    resolve(projectRootDir, "node_modules"),
                    resolve(projectRootDir, "src")
                ]
            }),

            compilerOptions: {
                dev: !production,
                accessors: true,
                hydratable: true
            }
        })
    ],
    resolve: {
        alias: {
            js: resolve(projectRootDir, "src/js"),
            sass: resolve(projectRootDir, "src/sass")
        },
        extensions: ['.js', '.svelte']
    },
});