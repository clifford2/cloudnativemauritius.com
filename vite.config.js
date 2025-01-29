import { defineConfig, loadEnv } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig((config) => {
    // Load env file based on `mode` in the current working directory.
    // Set the third parameter to '' to load all env regardless of the
    // `VITE_` prefix.
    const env = loadEnv(config.mode, process.cwd(), "");

    return {
        server:
            config.mode === "development"
                ? {
                      hmr: {
                          host: env["VITE_HMR_HOST"],
                      },
                  }
                : undefined,
        plugins: [
            laravel({
                input: ["resources/css/app.css", "resources/js/app.js"],
                refresh: true,
            }),
        ],
    };
});
