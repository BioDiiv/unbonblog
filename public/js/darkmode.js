let darkMode = localStorage.getItem('darkMode');
const darkModeToggle = document.querySelector('#dark-mode-toggle');

let navbar = document.querySelector("#navbar");
let footer = document.querySelector("#sticky-footer");

//check if dark mode is enabled
//turn off
//turn on

const enableDarkMode = () => {
    // 1. add the class darkmode to the body
    document.body.classList.add('darkmode');

    //removing bg-light from navbar and adding bg-dark
    navbar.classList.remove("bg-light");
    navbar.classList.add("bg-dark");

    //removing bg-light from footer and adding bg-dark
    footer.classList.remove("bg-light");
    footer.classList.add("bg-dark");

    // 2. update darkMode in the storage
    localStorage.setItem('darkMode', 'enabled');
}

const disableDarkmode = () => {
    // 1. remove class darkmode to body
    document.body.classList.remove('darkmode');

    //removing bg-dark from navbar and adding bg-light
    navbar.classList.remove("bg-dark")
    navbar.classList.add("bg-light")


    //removing bg-light from footer and adding bg-dark
    footer.classList.remove("bg-dark");
    footer.classList.add("bg-light");

    // 2. update darkMode to local storage
    localStorage.setItem("darkMode", null);
}

if(darkMode == 'enabled') {
    enableDarkMode();
}

darkModeToggle.addEventListener('click', () => {
    darkMode = localStorage.getItem('darkMode');
    if (darkMode !== "enabled") {
        enableDarkMode();
    }
    else {
        disableDarkmode();
    }
});

