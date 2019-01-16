//Dom Elements
const userMenuBtn = document.getElementById('userIcon');
const userMenu = document.getElementById('userBar');
const mainMenuBtn = document.getElementById('menuIcon');
const mainMenu = document.getElementById('mainNav');

//Booleans to check what menu is open/closed
let userMenuOpen = false;
let mainMenuOpen = false;


//Opens the main-menu if it contains the class "hidden"
//if it's open, hides
mainMenuBtn.addEventListener('click', () => {
    if (mainMenu.classList.contains('hidden')) {
        openMainMenu();
    } else {
        closeMainMenu();
    }
});

//Opens the main-menu and closes the user-menu if open
//sets the appropriate boolean to true
function openMainMenu() {
    mainMenu.classList.remove('hidden');
    mainMenuOpen = true;

    if (userMenuOpen === true) {
        closeUserMenu();
    }
}

//Closes the main-menu and sets the appropriate boolean to false
function closeMainMenu() {
    mainMenu.classList.add('hidden');
    mainMenuOpen = false;
}

//Opens the user-menu if it contains the class "hidden"
//if it's open, hides
userMenuBtn.addEventListener('click', () => {
    if (userMenu.classList.contains('hidden')) {
        openUserMenu();
    } else {
        closeUserMenu();
    }
})

//Opens the user-menu and closes the user-menu if open
//sets the appropriate boolean to true
function openUserMenu() {
    userMenu.classList.remove('hidden');
    userMenuOpen = true;

    if (mainMenuOpen === true) {
        closeMainMenu();
    }
}

//Closes the main-menu and sets the appropriate boolean to false
function closeUserMenu() {
    userMenu.classList.add('hidden');
    userMenuOpen = false;
}