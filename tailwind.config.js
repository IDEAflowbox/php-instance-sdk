module.exports = {
  prefix: "",
  important: false,
  separator: ":",
  theme: {
    screens: {
      sm: "576px",
      md: "768px",
      lg: "1024px",
      xl: "1280px",
      "2xl": "1400px",
      "3xl": "1600px",
    },
    colors: {
      transparent: "transparent",
      primary: "#292201",
      secondary: "#",
      tertiary: "#",
      quaternary: "#",
      quinary: "#",
      senary: "#",
      septenary: "#",
      octonary: "#",
      nonary: "#",

      black: "#000",
      white: "#fff",

      gray: {
        100: "#F5F6FA",
        200: "#DFE1EB",
        300: "#C8C8C8",
        400: "#B2B2B0",
        500: "#6F6E68",
        600: "#858580",
        700: "#",
        800: "#",
        900: "#151408",
      },
    },
    spacing: {
      px: "1px",
      "2px": "2px",
      "3px": "3px",
      "4px": "4px",
      "5px": "5px",
      "6px": "6px",
      0: "0",
      1: "2.5px",
      2: "4px",
      3: "7.5px",
      4: "10px",
      5: "12.5px",
      6: "15px",
      7: "17.5px",
      8: "20px",
      9: "22.5px",
      10: "25px",
      11: "27.5px",
      12: "30px",
      13: "32.5px",
      14: "35px",
      16: "40px",
      18: "45px",
      20: "50px",
      22: "55px",
      24: "60px",
      26: "65px",
      28: "70px",
      30: "75px",
      32: "80px",
      34: "85px",
      36: "90px",
      38: "95px",
      40: "100px",
      44: "110px",
      48: "120px",
      50: "125px",
      52: "130px",
      54: "135px",
      56: "140px",
      60: "150px",
      64: "160px",
      66: "165px",
      68: "170px",
      72: "180px",
      80: "200px",
      84: "210px",
      88: "220px",
      92: "230px",
      96: "240px",
      100: "250px",
      104: "260px",
      108: "270px",
      112: "280px",
      116: "290px",
      117: "292.5px",
      118: "295px",
      120: "300px",
      128: "320px",
      130: "325px",
      132: "330px",
      136: "340px",
      140: "350px",
      144: "360px",
      148: "370px",
      152: "380px",
      156: "390px",
      160: "400px",
      164: "410px",
      168: "420px",
      170: "425px",
      172: "430px",
      176: "440px",
      180: "450px",
      184: "460px",
      192: "480px",
      200: "500px",
      210: "525px",
      220: "550px",
      224: "560px",
      228: "570px",
      230: "575px",
      240: "600px",
      250: "625px",
      260: "650px",
      270: "675px",
      280: "700px",
      290: "725px",
      300: "750px",
      320: "800px",
      340: "850px",
      360: "900px",
      380: "950px",
      400: "1000px",
      420: "1050px",
      440: "1100px",
      460: "1150px",
      480: "1200px",
      500: "1250px",
      520: "1300px",
      540: "1350px",
      560: "1400px",
      580: "1450px",
      600: "1500px",
    },
    backgroundColor: (theme) => theme("colors"),
    backgroundPosition: {
      bottom: "bottom",
      center: "center",
      left: "left",
      "left-bottom": "left bottom",
      "left-top": "left top",
      right: "right",
      "right-bottom": "right bottom",
      "right-top": "right top",
      top: "top",
    },
    backgroundSize: {
      auto: "auto",
      "x-full": "100% auto",
      "y-full": "auto 100%",
      "x-50": "50% auto",
      cover: "cover",
      contain: "contain",
    },
    borderColor: (theme) => ({
      ...theme("colors"),
      default: theme("colors.gray.300", "currentColor"),
    }),
    borderRadius: {
      none: "0",
      sm: "0.125rem",
      default: "0.25rem",
      md: "0.375rem",
      lg: "0.5rem",
      xl: "1rem",
      "2xl": "2rem",
      "3xl": "3rem",
      "4xl": "4rem",
      "5xl": "5rem",
      full: "9999px",
      100: "100%",
    },
    borderWidth: {
      default: "1px",
      0: "0",
      1: "1px",
      2: "2px",
      3: "3px",
      4: "4px",
      6: "6px",
      8: "8px",
      10: "10px",
      12: "12px",
    },
    boxShadow: {
      default:
          "0px 3px 6px 0 rgb(0 0 0 / 6%)",
      none: "none",
    },
    container: {},
    cursor: {
      auto: "auto",
      default: "default",
      pointer: "pointer",
      wait: "wait",
      text: "text",
      move: "move",
      "not-allowed": "not-allowed",
    },
    fill: {
      current: "currentColor",
    },
    flex: {
      1: "1 1 0%",
      auto: "1 1 auto",
      initial: "0 1 auto",
      none: "none",
    },
    flexGrow: {
      0: "0",
      default: "1",
    },
    flexShrink: {
      0: "0",
      default: "1",
    },
    fontFamily: {
      primary: "'Ford Antenna', sans-serif",
      secondary: "'Ford Antenna', sans-serif",
    },
    fontSize: {
      xs: "12px",
      sm: "14px",
      base: "15px",
      lg: "19px",
      // xl: "2rem",
      // "2xl": "2.2rem",
      // "3xl": "2.5rem",
      // "4xl": "3rem",
      // "5xl": "3.5rem",
      // "6xl": "4rem",
      // "7xl": "4.5rem",
      // "8xl": "5rem",
      // "9xl": "5.5rem",
      // "10xl": "6rem",
      // "11xl": "80px",
      // "12xl": "100px",
      // "13xl": "149px",
      // "14xl": "200px",
      // "15xl": "230px",
      // "16xl": "289px",
      // "17xl": "420px",

      // "5px": "5px",
      // "6px": "6px",
      // "7px": "7px",
      // "8px": "8px",
      // "9px": "9px",
      // "10px": "10px",

      // "18em": "1.8em",
      // "20em": "2em",
      // "22em": "2.2em",
      // "25em": "2.5em",
      // "30em": "3em",
      // "35em": "3.5em",
      // "40em": "4em",
      // "45em": "4.5em",
      // "50em": "5em",
      // "55em": "5.5em",
      // "60em": "6em",

      // "2xs": "0.75em",	// 12px
      // xs: "0.875em",	// 14px
      // sm: "0.9375em",	// 15px
      // base: "1em",	// 16px
      // lg: "1.125em",	// 18px
      // xl: "1.25em",		// 20px
      // "2xl": "1.375em",
      // "3xl": "1.5625em",	// 25px
      // "4xl": "1.875em",	// 30px
      // "5xl": "2.1875em", // 35px
      // "6xl": "2.5em", 	// 40px
      // "7xl": "2.8125em", // 45px
      // "8xl": "3.125em",		// 50px
      // "9xl": "3.4375em", // 55px
      // "10xl": "3.75em",  // 60px
    },
    fontWeight: {
      hairline: "100",
      thin: "200",
      light: "300",
      normal: "400",
      medium: "500",
      semibold: "600",
      bold: "700",
      extrabold: "800",
      black: "900",
    },
    height: (theme) => ({
      auto: "auto",
      ...theme("spacing"),
      "70%": "70%",
      "80%": "80%",
      full: "100%",
      "110%": "110%",
      "120%": "120%",
      "screen-vw": "100vw",
      "125-vw": "125vw",
      screen: "100vh",
    }),
    inset: {
      0: "0",
      "1/2": "50%",
      100: "100%",
      auto: "auto",
    },
    letterSpacing: {
      tighter: "-0.05em",
      tight: "-0.025em",
      normal: "0",
      lg: "1px",
      xl: "1.3px",
      "2xl": "2px",
      "3xl": "2px",
    },
    lineHeight: {
      below: "0.72",
      none: "1",
      tight: "1.25",
      snug: "1.375",
      normal: "1.5",
      relaxed: "1.625",
      loose: "1.75",
      3: ".75rem",
      4: "1rem",
      5: "1.25rem",
      6: "1.5rem",
      7: "1.75rem",
      8: "2rem",
      9: "2.25rem",
      10: "2.5rem",
    },
    listStyleType: {
      none: "none",
      disc: "disc",
      decimal: "decimal",
    },
    margin: (theme, { negative }) => ({
      auto: "auto",
      ...theme("spacing"),
      ...negative(theme("spacing")),
    }),
    maxHeight: (theme) => ({
      auto: "auto",
      ...theme("spacing"),
      full: "100%",
      screen: "100vh",
    }),
    maxWidth: (theme, { breakpoints }) => ({
      none: "none",
      auto: "auto",
      ...theme("spacing"),
      "1/2": "50%",
      full: "100%",
      screen: "100vw",
      ...breakpoints(theme("screens")),
    }),
    minHeight: (theme) => ({
      0: "0",
      auto: "auto",
      ...theme("spacing"),
      full: "100%",
      screen: "100vh",
    }),
    minWidth: (theme) => ({
      0: "0",
      auto: "auto",
      ...theme("spacing"),
      full: "100%",
      screen: "100vh",
    }),
    objectPosition: {
      bottom: "bottom",
      center: "center",
      left: "left",
      "left-bottom": "left bottom",
      "left-top": "left top",
      right: "right",
      "right-bottom": "right bottom",
      "right-top": "right top",
      top: "top",
    },
    opacity: {
      0: "0",
      10: "0.1",
      15: "0.15",
      20: "0.2",
      25: "0.25",
      35: "0.35",
      50: "0.5",
      60: "0.6",
      75: "0.75",
      85: "0.85",
      90: "0.90",
      100: "1",
    },
    order: {
      first: "-9999",
      last: "9999",
      none: "0",
      1: "1",
      2: "2",
      3: "3",
      4: "4",
      5: "5",
      6: "6",
      7: "7",
      8: "8",
      9: "9",
      10: "10",
      11: "11",
      12: "12",
    },
    padding: (theme) => theme("spacing"),
    placeholderColor: (theme) => theme("colors"),
    stroke: {
      current: "currentColor",
    },
    strokeWidth: {
      0: "0",
      1: "1",
      2: "2",
    },
    textColor: (theme) => theme("colors"),
    width: (theme) => ({
      auto: "auto",
      ...theme("spacing"),
      "1/2": "50%",
      "1/3": "33.333333%",
      "2/3": "66.666667%",
      "1/4": "25%",
      "2/4": "50%",
      "3/4": "75%",
      "1/5": "20%",
      "2/5": "40%",
      "3/5": "60%",
      "4/5": "80%",
      "1/6": "16.666667%",
      "2/6": "33.333333%",
      "3/6": "50%",
      "4/6": "66.666667%",
      "5/6": "83.333333%",
      "1/8": "12.5%",
      "3/8": "37.5%",
      "1/12": "8.333333%",
      "2/12": "16.666667%",
      "3/12": "25%",
      "4/12": "33.333333%",
      "5/12": "41.666667%",
      "6/12": "50%",
      "7/12": "58.333333%",
      "8/12": "66.666667%",
      "9/12": "75%",
      "10/12": "83.333333%",
      "11/12": "91.666667%",
      "11/20": "55%",
      "9/20": "45%",
      full: "100%",
      "125-vw": "125vw",
      screen: "100vw",
    }),
    zIndex: {
      auto: "auto",
      0: "0",
      10: "10",
      20: "20",
      30: "30",
      40: "40",
      50: "50",
      60: "60",
      70: "70",
      80: "80",
      90: "90",
      100: "100",
    },
    // gap: (theme) => theme("spacing"),
    // gridTemplateColumns: {
    // 	none: "none",
    // 	1: "repeat(1, minmax(0, 1fr))",
    // 	2: "repeat(2, minmax(0, 1fr))",
    // 	3: "repeat(3, minmax(0, 1fr))",
    // 	4: "repeat(4, minmax(0, 1fr))",
    // 	5: "repeat(5, minmax(0, 1fr))",
    // 	6: "repeat(6, minmax(0, 1fr))",
    // 	7: "repeat(7, minmax(0, 1fr))",
    // 	8: "repeat(8, minmax(0, 1fr))",
    // 	9: "repeat(9, minmax(0, 1fr))",
    // 	10: "repeat(10, minmax(0, 1fr))",
    // 	11: "repeat(11, minmax(0, 1fr))",
    // 	12: "repeat(12, minmax(0, 1fr))",
    // },
    // gridColumn: {
    // 	auto: "auto",
    // 	"span-1": "span 1 / span 1",
    // 	"span-2": "span 2 / span 2",
    // 	"span-3": "span 3 / span 3",
    // 	"span-4": "span 4 / span 4",
    // 	"span-5": "span 5 / span 5",
    // 	"span-6": "span 6 / span 6",
    // 	"span-7": "span 7 / span 7",
    // 	"span-8": "span 8 / span 8",
    // 	"span-9": "span 9 / span 9",
    // 	"span-10": "span 10 / span 10",
    // 	"span-11": "span 11 / span 11",
    // 	"span-12": "span 12 / span 12",
    // },
    // gridColumnStart: {
    // 	auto: "auto",
    // 	1: "1",
    // 	2: "2",
    // 	3: "3",
    // 	4: "4",
    // 	5: "5",
    // 	6: "6",
    // 	7: "7",
    // 	8: "8",
    // 	9: "9",
    // 	10: "10",
    // 	11: "11",
    // 	12: "12",
    // 	13: "13",
    // },
    // gridColumnEnd: {
    // 	auto: "auto",
    // 	1: "1",
    // 	2: "2",
    // 	3: "3",
    // 	4: "4",
    // 	5: "5",
    // 	6: "6",
    // 	7: "7",
    // 	8: "8",
    // 	9: "9",
    // 	10: "10",
    // 	11: "11",
    // 	12: "12",
    // 	13: "13",
    // },
    // gridTemplateRows: {
    // 	none: "none",
    // 	1: "repeat(1, minmax(0, 1fr))",
    // 	2: "repeat(2, minmax(0, 1fr))",
    // 	3: "repeat(3, minmax(0, 1fr))",
    // 	4: "repeat(4, minmax(0, 1fr))",
    // 	5: "repeat(5, minmax(0, 1fr))",
    // 	6: "repeat(6, minmax(0, 1fr))",
    // },
    // gridRow: {
    // 	auto: "auto",
    // 	"span-1": "span 1 / span 1",
    // 	"span-2": "span 2 / span 2",
    // 	"span-3": "span 3 / span 3",
    // 	"span-4": "span 4 / span 4",
    // 	"span-5": "span 5 / span 5",
    // 	"span-6": "span 6 / span 6",
    // },
    // gridRowStart: {
    // 	auto: "auto",
    // 	1: "1",
    // 	2: "2",
    // 	3: "3",
    // 	4: "4",
    // 	5: "5",
    // 	6: "6",
    // 	7: "7",
    // },
    // gridRowEnd: {
    // 	auto: "auto",
    // 	1: "1",
    // 	2: "2",
    // 	3: "3",
    // 	4: "4",
    // 	5: "5",
    // 	6: "6",
    // 	7: "7",
    // },
    transformOrigin: {
      center: "center",
      top: "top",
      "top-right": "top right",
      right: "right",
      "bottom-right": "bottom right",
      bottom: "bottom",
      "bottom-left": "bottom left",
      left: "left",
      "top-left": "top left",
    },
    scale: {
      0: "0",
      50: ".5",
      75: ".75",
      90: ".9",
      95: ".95",
      100: "1",
      105: "1.05",
      110: "1.1",
      125: "1.25",
      150: "1.5",
      175: "1.75",
      200: "2",
      400: "4",
    },
    rotate: {
      "-180": "-180deg",
      "-90": "-90deg",
      "-45": "-45deg",
      "-30": "-30deg",
      0: "0",
      20: "20deg",
      30: "30deg",
      45: "45deg",
      90: "90deg",
      180: "180deg",
    },
    translate: (theme, { negative }) => ({
      ...theme("spacing"),
      ...negative(theme("spacing")),
      "-full": "-100%",
      "-1/2": "-50%",
      "1/2": "50%",
      full: "100%",
    }),
    skew: {
      "-12": "-12deg",
      "-6": "-6deg",
      "-3": "-3deg",
      0: "0",
      3: "3deg",
      6: "6deg",
      12: "12deg",
    },
    transitionProperty: {
      none: "none",
      all: "all",
      default:
          "background-color, border-color, color, fill, stroke, opacity, box-shadow, transform",
      colors: "background-color, border-color, color, fill, stroke",
      opacity: "opacity",
      shadow: "box-shadow",
      transform: "transform",
    },
    transitionTimingFunction: {
      linear: "linear",
      in: "cubic-bezier(0.4, 0, 1, 1)",
      out: "cubic-bezier(0, 0, 0.2, 1)",
      "in-out": "cubic-bezier(0.4, 0, 0.2, 1)",
    },
    transitionDuration: {
      75: "75ms",
      100: "100ms",
      150: "150ms",
      200: "200ms",
      300: "300ms",
      400: "400ms",
      500: "500ms",
      600: "600ms",
      700: "700ms",
      800: "800ms",
      900: "900ms",
      1000: "1000ms",
      1500: "1500ms",
      2000: "2000ms",
      3000: "3000ms",
    },
    extend: {
      transitionDelay: {
        100: "100ms",
        150: "150ms",
        200: "200ms",
        300: "300ms",
        400: "400ms",
        500: "500ms",
        600: "600ms",
        700: "700ms",
        800: "800ms",
        900: "900ms",
        1000: "1000ms",
        1100: "1100ms",
        1200: "1200ms",
        1400: "1400ms",
        1500: "1500ms",
        1600: "1600ms",
      }
    }
  },
  variantOrder: [
    "first",
    "last",
    "odd",
    "even",
    "visited",
    "checked",
    "group-hover",
    "group-focus",
    "focus-within",
    "hover",
    "focus",
    "focus-visible",
    "active",
    "disabled",
  ],
  variants: {
    accessibility: ["responsive", "focus"],
    alignContent: ["responsive"],
    alignItems: ["responsive"],
    alignSelf: ["responsive"],
    appearance: ["responsive"],
    backgroundAttachment: ["responsive"],
    backgroundColor: ["responsive", "hover", "group-hover", "focus"],
    backgroundPosition: ["responsive"],
    backgroundRepeat: ["responsive"],
    backgroundSize: ["responsive"],
    borderCollapse: ["responsive"],
    borderColor: ["responsive", "hover", "group-hover", "focus"],
    borderRadius: ["responsive"],
    borderStyle: ["responsive"],
    borderWidth: ["responsive"],
    boxShadow: ["responsive", "hover", "group-hover", "focus"],
    boxSizing: ["responsive"],
    cursor: ["responsive"],
    display: ["responsive", "hover", "group-hover", "focus"],
    fill: ["responsive"],
    flex: ["responsive"],
    flexDirection: ["responsive"],
    flexGrow: ["responsive"],
    flexShrink: ["responsive"],
    flexWrap: ["responsive"],
    float: ["responsive"],
    clear: ["responsive"],
    fontFamily: ["responsive"],
    fontSize: ["responsive"],
    fontSmoothing: ["responsive"],
    fontStyle: ["responsive"],
    fontWeight: ["responsive", "hover", "group-hover", "focus"],
    height: ["responsive", "hover", "group-hover", "focus"],
    inset: ["responsive"],
    justifyContent: ["responsive"],
    letterSpacing: ["responsive"],
    lineHeight: ["responsive"],
    listStylePosition: ["responsive"],
    listStyleType: ["responsive"],
    margin: ["responsive", "hover", "group-hover"],
    maxHeight: ["responsive", "hover", "group-hover", "focus"],
    maxWidth: ["responsive", "hover", "group-hover", "focus"],
    minHeight: ["responsive", "hover", "group-hover", "focus"],
    minWidth: ["responsive", "hover", "group-hover", "focus"],
    objectFit: ["responsive"],
    objectPosition: ["responsive"],
    opacity: ["responsive", "hover", "group-hover", "focus"],
    order: ["responsive"],
    outline: ["responsive", "focus"],
    overflow: ["responsive"],
    padding: ["responsive"],
    placeholderColor: ["responsive", "focus"],
    pointerEvents: ["responsive", "group-hover"],
    position: ["responsive"],
    resize: ["responsive"],
    stroke: ["responsive"],
    strokeWidth: ["responsive"],
    tableLayout: ["responsive"],
    textAlign: ["responsive"],
    textColor: ["responsive", "hover", "group-hover", "focus"],
    textDecoration: ["responsive", "hover", "group-hover", "focus"],
    textTransform: ["responsive"],
    userSelect: ["responsive"],
    verticalAlign: ["responsive"],
    visibility: ["responsive"],
    whitespace: ["responsive"],
    width: ["responsive", "hover", "group-hover", "focus"],
    wordBreak: ["responsive"],
    zIndex: ["responsive"],
    gap: ["responsive"],
    gridAutoFlow: ["responsive"],
    gridTemplateColumns: ["responsive"],
    gridColumn: ["responsive"],
    gridColumnStart: ["responsive"],
    gridColumnEnd: ["responsive"],
    gridTemplateRows: ["responsive"],
    gridRow: ["responsive"],
    gridRowStart: ["responsive"],
    gridRowEnd: ["responsive"],
    transform: ["responsive"],
    transformOrigin: ["responsive"],
    scale: ["responsive", "hover", "group-hover", "focus"],
    rotate: ["responsive", "hover", "group-hover", "focus"],
    translate: ["responsive", "hover", "group-hover", "focus"],
    skew: ["responsive", "hover", "group-hover", "focus"],
    transitionProperty: ["responsive"],
    transitionTimingFunction: ["responsive"],
    transitionDuration: ["responsive"],
  },
  corePlugins: {
    backgroundOpacity: true,
    // container:false
  },
  plugins: [],
};