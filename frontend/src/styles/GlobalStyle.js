import { createGlobalStyle } from "styled-components";

const GlobalStyle = createGlobalStyle`
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap');

    html {
        font-size: 62.5%;
    }
    :root {
        --primary-font: 'Montserrat', sans-serif;
        --clr-dark: ${(props) => props.theme.colors.dark};
        --clr-light: ${(props) => props.theme.colors.light};
        --fs-h1: clamp(3rem, 4vw, 4.8rem);
        --fs-h2: clamp(2.5rem, 4vw, 3rem);
        --fs-h3: clamp(2rem, 4vw, 2.5rem);
        --fs-h4: clamp(1.8rem, 4vw, 2rem);
        --fs-h5: clamp(1.6rem, 4vw, 1.8rem);
        --fs-h6: clamp(1.4rem, 4vw, 1.6rem);
        --fs-text: clamp(1.4rem, 4vw, 1.6rem);
        --transition: all 0.3s ease-in-out;
    }

    body {
        background-color: var(--clr-light);
        font-family: var(--primary-font);
        font-weight: 400;
        color: var(--clr-dark);
        line-height: 1.5;
        font-size: var(--fs-text);
    }

    h1,h2,h3 {
        font-weight: 700;
    }
    h4, h5, h6 {
        font-weight: 600;
    }

    h1 {
        font-size: var(--fs-h1);
    }
    h2 {
        fons-size: var(--fs-h2);
    }
    h3 {
        fons-size: var(--fs-h3);
    }
    h4 {
        fons-size: var(--fs-h4);
    }
    h5 {
        fons-size: var(--fs-h5);
    }
    h6 {
        fons-size: var(--fs-h6);
    }
    p:last-of-type, figure {
        margin-bottom: 0;
    }
    a {
        color: var(--clr-primary);
        text-decoration: none;
        transition: var(--transition);

        &:hover {
            color: var(--clr-primary-hover);
        }
    }
    img {
        max-width: 100%;
        height: auto;
    }
    ul, ol {
        list-style: none;
    }
`;

export default GlobalStyle;
