function exitLogin() {
    window.location.href = "/";
}

function inputFocus() {
    document.getElementById('error').display = 'none';
    document.getElementById('error').innerText = '';
    document.getElementById('error').classList.remove('error');
}

document.querySelector("input").addEventListener('focus', () => {
    console.log("Entering password");
});

document.getElementById('form').addEventListener('submit', function (event) {
    event.preventDefault();

    let inputs = document.querySelectorAll('input');

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == '' || inputs[i].value == null || inputs[i].value == undefined || inputs[i].value.length < 3) {
            document.getElementById('error').classList.add('error');
            document.getElementById('error').innerText = 'Please fill out all the fields properly.';
            console.log('Not all fields have been filled.')
            return;
        }
    }
    // document.getElementById('form').submit();
    alert('Form submitted');
    console.log('Form submitted');
    return window.location.href = '/';
});

function register() {
    alert('Registered successfully.');
    return window.location.href = '/';
}

function checkForPreset() {
    const urlParams = new URLSearchParams(window.location.search);
    let username = urlParams.get('username');
    let password = urlParams.get('password');
    updateValues(username, password);
}

function updateValues(username, password) {

    document.getElementById('username').value = username;
    document.getElementById('password').value = password;

}

window.onload = checkForPreset();