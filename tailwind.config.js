/* eslint-disable quote-props */
/* eslint-disable indent */
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.{php,html,js}','./template-parts/*.{php,html,js}','./page-templates/*.{php,html,js}'],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      'white': '#ffffff',
      'black': '#000',
      'dark': '#2D2D2D',
      'gray': '#808285',
      'light-gray': '#F3F4F7',
      'green': '#00665E',
    },
    fontFamily: {
      openSans: ['Open Sans', 'sans-serif'],
    },
    fontSize: {
      'base': '16px',
      '12px': '12px',
      '14px': '14px',
      '16px': '16px',
      '18px': '18px',
      '21px': '21px',
      '24px': '24px',
      '28px': '28px',
      '32px': '32px',
      '38px': '38px',
      '50px': '50px',
      '60px': '60px',
      '67px': '67px',
    },
    lineHeight: {
      '0': '0',
      '1': '1',
      '120': '1.2',
      '130': '1.3',
      '140': '1.4',
      '150': '1.5',
      '160': '1.6',
    },
    fontWeight: {
      300: '300',
      400: '400',
      600: '600',
      700: '700',
      bold: '700',
      800: '800',
      900: '900',
    },
    spacing: {
      '0': '0px',
      '1px': '1px',
      '2px': '2px',
      '3px': '3px',
      '4px': '4px',
      '5px': '5px',
      '6px': '6px',
      '8px': '8px',
      '10px': '10px',
      '12px': '12px',
      '14px': '14px',
      '16px': '16px',
      '20px': '20px',
      '21px': '21px',
      '24px': '24px',
      '25px': '25px',
      '30px': '30px',
      '32px': '32px',
      '36px': '36px',
      '38px': '38px',
      '40px': '40px',
      '44px': '44px',
      '48px': '48px',
      '50px': '50px',
      '54px': '54px',
      'half': '50%',
      '60px': '60px',
      '64px': '64px',
      '70px': '70px',
      '80px': '80px',
      '84px': '84px',
      '90px': '90px',
      '100px': '100px',
      '120px': '120px',
      '130px': '130px',
      '140px': '140px',
      '150px': '150px',
      '160px': '160px',
      '180px': '180px',
      '190px': '190px',
      'full': '100%',
      'unset': 'unset',
      '5%': '5%',
      '10%': '10%',
      '15%': '15%',
      '16%': '16%',
      '20%': '20%',
      '25%': '25%',
      '30%': '30%',
      '33%': '33.33%',
      '35%': '35%',
      '40%': '40%',
      '45%': '45%',
      '50%': '50%',
      '55%': '55%',
      '60%': '60%',
      '65%': '65%',
      '70%': '70%',
      '75%': '75%',
      '80%': '80%',
      '85%': '85%',
      '90%': '90%',
      '95%': '95%',
      '100%': '100%',
    },
    borderRadius: {
      '0': '0px',
      '8px': '8px',
      '12px': '12px',
      '16px': '16px',
      '24px': '24px',
      '50': '50%',
      'circle': '50%',
    },
    zIndex: {
      '1': '1',
      '2': '2',
      '3': '3',
      '4': '4',
      '5': '5',
      '99': '99',
      '999': '999',
      '9999': '9999',
    },
    borderWidth: {
      DEFAULT: '1px',
      '1px': '1px',
      '2px': '2px',
      '3px': '3px',
      '4px': '4px',
      '5px': '5px',
    },
    container: {
      center: true, // Center the container by default
      padding: '20px',
      screens: {
        sm: '100%',
        md: '1340px',
        lg: '1340px',
        xl: '1340px',
        '2xl': '1340px',
      },
    },
  },
    extend: {},
  plugins: [],
};