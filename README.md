**Note**: This is an update to the original authors work to bring it in line with Inertia.js 1.0 with Vite and SSR support
You will also need to use my fork of the inertia-wordpress adapter (unless they accept my PR)

https://github.com/MattPurland/inertia-wordpress

## WordPress/Vue Starter Theme Using Inertia.js

A bare-bones example theme using Inertia with Vue, and the WordPress Inertia adapter.

### Installation
Clone this repository into the WordPress themes directory.

```bash
cd *your-theme-name*

composer install

npm install
npm run dev
```

To use the ssr server, you will need to build for production
```bash
cd *your-theme-name

npm run build

node build/ssr/ssr.js
```

### References
https://inertiajs.com/
https://github.com/boxybird/inertia-wordpress
https://vuejs.org/


### License
[MIT license](https://opensource.org/licenses/MIT)