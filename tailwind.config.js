/* eslint-disable quote-props */
/* eslint-disable indent */
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./*.{php,html,js}','./template-parts/*.{php,html,js}','./template-parts/flexible-content/*.{php,html,js}','./page-templates/*.{php,html,js}','./src/js/*.{php,html,js}'],
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      inherit: 'inherit',
      'white': '#ffffff',
      'faded-white': '#FAFAFA',
      'black': '#000',
      'dark': '#2D2D2D',
      'gray': '#808285',
      'light-gray': '#F3F4F7',
      'faded-gray': '#F5F5F5',
      'medium-gray': '#D9D9D9',
      'border-gray': '#F3F3F3',
      'green': '#00665E',
      'lime-green': '#D7F8DD',
      'dark-green': '#0C544F',
      'light-green': '#E6F2EB',
      'medium-green': '#C7E1D2',
      'light-yellow': '#E9DD7F',
      'yellow': '#FAAF3F',
      'orange': '#FFC36B',
      'red': '#E18067',
      'light-red': '#F5D5CD',
      'blue': '#02739F',
      'papirus': '#FEDFAC',
    },
    fontFamily: {
      openSans: ['Open Sans', 'sans-serif'],
    },
    fontSize: {
      'base': '16px',
      '12px': '12px',
      '14px': '14px',
      '15px': '15px',
      '16px': '16px',
      '17px': '17px',
      '18px': '18px',
      '20px': '20px',
      '21px': '21px',
      '22px': '22px',
      '24px': '24px',
      '26px': '26px',
      '28px': '28px',
      '30px': '30px',
      '32px': '32px',
      '36px': '36px',
      '38px': '38px',
      '40px': '40px',
      '48px': '48px',
      '50px': '50px',
      '52px': '52px',
      '56px': '56px',
      '60px': '60px',
      '64px': '64px',
      '67px': '67px',
      '87px': '87px',
      '90px': '90px',
    },
    lineHeight: {
      '0': '0',
      '1': '1',
      '110': '1.1',
      '120': '1.2',
      '130': '1.3',
      '140': '1.4',
      '150': '1.5',
      '160': '1.6',
    },
    fontWeight: {
      300: '300',
      400: '400',
      500: '500',
      600: '600',
      700: '700',
      bold: '700',
      800: '800',
      900: '900',
    },
    spacing: {
      'auto': 'auto',
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
      '26px': '26px',
      '30px': '30px',
      '32px': '32px',
      '34px': '34px',
      '35px': '35px',
      '36px': '36px',
      '38px': '38px',
      '40px': '40px',
      '42px': '42px',
      '44px': '44px',
      '48px': '48px',
      '50px': '50px',
      '54px': '54px',
      '56px': '56px',
      '58px': '58px',
      'half': '50%',
      '60px': '60px',
      '64px': '64px',
      '70px': '70px',
      '72px': '72px',
      '78px': '78px',
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
      '200px': '200px',
      '300px': '300px',
      '400px': '400px',
      '500px': '500px',
      '600px': '600px',
      '700px': '700px',
      '800px': '800px',
      '900px': '900px',
      '1000px': '1000px',
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
      '20px': '20px',
      '24px': '24px',
      '32px': '32px',
      '48px': '48px',
      '56px': '56px',
      '50': '50%',
      'circle': '50%',
    },
    zIndex: {
      '1': '1',
      '2': '2',
      '3': '3',
      '4': '4',
      '5': '5',
      '9': '9',
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
        md: '1368px',
        lg: '1368px',
        xl: '1368px',
        '2xl': '1368px',
      },
    },
    screens: {
      'sm': '640px',   // Small devices (default)
      'md': '768px',   // Medium devices (default)
      'lg': '992px',  // Large devices (default)
      'xl': '1280px',  // Extra large devices (default)
      '2xl': '1536px', // Custom large breakpoint
      // Add more custom breakpoints as needed
    },
  },
  extend: {},
  plugins: [],
};