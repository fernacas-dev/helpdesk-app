import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import react from "@vitejs/plugin-react";
import dotenv from "dotenv";
import path from "path";

dotenv.config();

export default defineConfig({
    plugins: [
        laravel({
            input: ["resources/css/app.css", "resources/js/app.js"],
            refresh: true,
        }),
        react(),
    ],
    resolve: {
        alias: {
            "@": path.resolve(__dirname, "resources/js"),
        },
        extensions: [".js", ".jsx", ".ts", ".tsx"],
    },
    build: {
        chunkSizeWarningLimit: 521,
    },
    // optimizeDeps: {
    //     disabled: true,
    // },
});
