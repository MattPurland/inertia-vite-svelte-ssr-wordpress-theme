import { createInertiaApp } from '@inertiajs/svelte'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.svelte', { eager: true })
        return pages[`./Pages/${name}.svelte`]
    },
    setup({ el, App }) {
        new App({ target: el, hydrate: true })
    },
    progress: {
        color: '#e72176',
        showSpinner: true,
        includeCSS: false
    }
})
