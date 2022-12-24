function exitLogin() {
    window.location.href = "/";
}

function inputFocus() {
    console.log("Typing...");
}

document.querySelector("input[type=password]").addEventListener('focus', () => {
    console.log("Entering password");
});

document.getElementById('form').addEventListener('submit', function (event) {
    event.preventDefault();

    let inputs = document.querySelectorAll('input');

    for (let i = 0; i < inputs.length; i++) {
        if (inputs[i].value == '' || inputs[i].value == null || inputs[i].value == undefined || inputs[i].value.length < 3) {
            alert('Please fill out all the fields properly.');
            console.log('Not all fields have been filled.')
            return;
        }
    }

    console.log('Form submitted');
});