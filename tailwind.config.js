module.exports = {
  content: require('fast-glob').sync([
      './**/*.php'
  ]),
  theme: {
    container: {
      screens: {
        sm: '600px',
        md: '769px',
        lg: '1025px',
        xl: '1440px',
        '2xl': '1440px'
      },
    },
    extend: {
      fontFamily: {
        jost: ["Jost", "sans-serif"],
        prompt: ["Prompt", "sans-serif"],
      },
      colors: { 
        'brown': '#1B1B1B',
        'green': '#96EB42',
        'darkBrown': '#1F211C',
        'lightDark': '#3B3B3B',
    },
    },
  },
  plugins: [],
}