import Alpine from "alpinejs";

// Atau gunakan require jika ada masalah
// const Alpine = require('alpinejs').default;

window.Alpine = Alpine;

// Start Alpine
Alpine.start();

// Custom JavaScript
console.log("Laravel Mix with TALL Stack loaded!");

// Livewire turbo (jika menggunakan Livewire 3)
document.addEventListener("livewire:init", () => {
    console.log("Livewire initialized");
});
