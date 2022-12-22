function exitLogin() {
    window.location.href = "/";
}

function inputFocus() {
    console.log("Typing...");
}

document.querySelector("input[type=password]").addEventListener('focus', () => {
    console.log("Entering password");
});