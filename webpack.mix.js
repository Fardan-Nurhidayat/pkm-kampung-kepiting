const mix = require("laravel-mix");

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 */

// JavaScript compilation
mix.js("resources/js/app.js", "public/js").extract(["alpinejs"]); // Extract vendor libraries

// SCSS/Sass compilation
mix.sass("resources/sass/app.scss", "public/css");

// PostCSS dengan Tailwind
mix.postCss("resources/css/app.css", "public/css", [
    require("postcss-import"),
    require("tailwindcss/nesting"),
    require("tailwindcss"),
    require("autoprefixer"),
]);

// Options
mix.options({
    processCssUrls: false,
    postCss: [require("autoprefixer")],
});

// Source maps untuk development
if (!mix.inProduction()) {
    mix.sourceMaps();
}

// Versioning untuk production
if (mix.inProduction()) {
    mix.version();
}

// Browser sync untuk development (opsional)
mix.browserSync({
    proxy: "your-local-domain.test",
});
