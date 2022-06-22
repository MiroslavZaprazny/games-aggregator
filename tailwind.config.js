/** @type {import('tailwindcss').Config} */
module.exports = {
  variants: {
    margin: ['responsive', 'hover'],
  },
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
