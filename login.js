function exitLogin() {
    window.location.href = "/";
}

function inputFocus() {
    document.getElementById('error').display = 'none';
    document.getElementById('error').innerText = '';
    document.getElementById('error').classList.remove('error');
}


document.getElementById('form').addEventListener('submit', async function (event) {
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
    console.log('Form submitted');


    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;


    // const xhr = new XMLHttpRequest();
    // xhr.open('POST', '/api/login.php', true);
    // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    // xhr.onreadystatechange = async function () {
    //     if (xhr.readyState === 4 && xhr.status === 200) {


    //         await localStorage.setItem('user', xhr.responseText);

    //         if (xhr.responseText.includes('Incorrect')) {
    //             document.getElementById('error').classList.add('error');
    //             document.getElementById('error').innerText = 'Incorrect username or password.';
    //             await localStorage.removeItem('user');
    //             return;
    //         } else {
    //             localStorage.setItem('user', xhr.responseText);
    //             console.log('All good.');
    //         }
    //     }
    // }


    // await xhr.send(`username=${username}&password=${password}`);

    // if (!localStorage.getItem('user')) return await xhr.send(`username=${username}&password=${password}`);

    // if (localStorage.getItem('user').includes('Incorrect')) {

    //     document.getElementById('error').classList.add('error');
    //     document.getElementById('error').innerText = 'Incorrect username or password.';

    //     await localStorage.removeItem('user');

    //     return;
    // } else {
    //     console.log('All good...')
    // }

    // await setTimeout(() => {
    //     alert('Form submitted');
    //     // window.location.href = '/';
    // }, 1);
});

function wrongLogin() {
    document.getElementById('error').classList.add('error');
    document.getElementById('error').innerText = 'Incorrect username or password.';
    return;
}

// function register() {
//     alert('Registered successfully.');
//     return window.location.href = '/';
// }

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