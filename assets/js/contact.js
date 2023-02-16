function validate() {
    let name = document.getElementById('name');
    let email = document.getElementById('email');
    let message = document.getElementById('message');

    if (!name.value || name.value.length < 3) {
        alert("Please fill all required fields properly.");
        return false;
    }

    if (!email.value || !(email.value.includes('@') && email.value.includes('.'))) {
        alert("Please fill all required fields properly.");
        return false;
    }

    if (!message.value || message.value.length < 3) {
        alert("Please fill all required fields properly.");
        return false;
    }

    return alert(`Message sent successfully, thank you ${name.value}.`);
}