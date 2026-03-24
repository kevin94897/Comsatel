import { defineConfig } from 'vite';
import { resolve, dirname } from 'path';
import { fileURLToPath } from 'url';

const __dirname = dirname(fileURLToPath(import.meta.url));

export default defineConfig({
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        // CSS entry – Tailwind + global.css (importado desde tailwind.css)
        tailwind: resolve(__dirname, 'src/tailwind.css'),

        // JS entries – un archivo por cada script de WordPress
        scripts:         resolve(__dirname, 'js/scripts.js'),
        calculator:      resolve(__dirname, 'js/calculator.js'),
        blog:            resolve(__dirname, 'js/blog.js'),
        cotizador:       resolve(__dirname, 'js/cotizador.js'),
        'form-validator': resolve(__dirname, 'js/form-validator.js'),
        navigation:      resolve(__dirname, 'js/navigation.js'),
        ubicaciones:     resolve(__dirname, 'js/ubicaciones.js'),
        customizer:      resolve(__dirname, 'js/customizer.js'),
        sliderSwiper:    resolve(__dirname, 'js/sliderSwiper.js'),
        'validator-init': resolve(__dirname, 'js/validator-init.js'),
      },
      output: {
        // Sin hashes – WordPress necesita nombres de archivo predecibles
        entryFileNames: 'js/[name].js',
        chunkFileNames: 'js/chunks/[name].js',
        assetFileNames: ({ names }) => {
          if (names?.some((n) => n.endsWith('.css'))) return 'css/[name][extname]';
          return 'assets/[name][extname]';
        },
      },
    },
  },
});
