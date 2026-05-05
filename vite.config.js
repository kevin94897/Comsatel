import { defineConfig } from 'vite';
import { resolve, dirname } from 'path';
import { fileURLToPath } from 'url';
import fs from 'fs';

const __dirname = dirname(fileURLToPath(import.meta.url));
const hotFile = resolve(__dirname, 'hot');

export default defineConfig({
  server: {
    host: '0.0.0.0',      // escucha en todas las interfaces, no solo localhost
    port: 5173,
    cors: true,
    hmr: {
      host: 'comsatel.local', // mismo dominio que WordPress → sin bloqueo cross-origin
      port: 5173,
      protocol: 'ws',
    },
  },
  plugins: [
    {
      name: 'wordpress-hot-file',

      configureServer(server) {
        // Escribir puerto al archivo `hot` cuando el dev server arranca
        server.httpServer.once('listening', () => {
          const address = server.httpServer.address();
          const port = typeof address === 'object' ? address.port : 5173;
          fs.writeFileSync(hotFile, port.toString());
        });

        // Limpiar `hot` cuando el servidor HTTP se cierra (Ctrl+C, SIGTERM, etc.)
        server.httpServer.once('close', () => {
          if (fs.existsSync(hotFile)) fs.unlinkSync(hotFile);
        });
      },

      buildStart() {
        // Eliminar `hot` huérfano antes de cada build de producción
        if (fs.existsSync(hotFile)) fs.unlinkSync(hotFile);
      },
    },
  ],
  build: {
    outDir: 'dist',
    emptyOutDir: true,
    rollupOptions: {
      input: {
        tailwind:         resolve(__dirname, 'src/tailwind.css'),
        scripts:          resolve(__dirname, 'js/scripts.js'),
        calculator:       resolve(__dirname, 'js/calculator.js'),
        blog:             resolve(__dirname, 'js/blog.js'),
        cotizador:        resolve(__dirname, 'js/cotizador.js'),
        'form-validator': resolve(__dirname, 'js/form-validator.js'),
        navigation:       resolve(__dirname, 'js/navigation.js'),
        ubicaciones:      resolve(__dirname, 'js/ubicaciones.js'),
        customizer:       resolve(__dirname, 'js/customizer.js'),
        sliderSwiper:     resolve(__dirname, 'js/sliderSwiper.js'),
        'validator-init': resolve(__dirname, 'js/validator-init.js'),
      },
      output: {
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
