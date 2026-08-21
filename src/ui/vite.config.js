import { defineConfig } from 'vite';
import react from '@vitejs/plugin-react';
import tailwindcss from '@tailwindcss/vite';
import { resolve } from 'node:path';

// Saída direta para dentro do tema: o PHP só enfileira o que sai daqui.
export default defineConfig({
  plugins: [react(), tailwindcss()],
  build: {
    outDir: resolve(import.meta.dirname, '../theme/mukutu-base/assets/ui'),
    emptyOutDir: true,
    rollupOptions: {
      input: resolve(import.meta.dirname, 'src/main.jsx'),
      output: {
        entryFileNames: 'ui.js',
        assetFileNames: 'ui.[ext]',
      },
    },
  },
});
