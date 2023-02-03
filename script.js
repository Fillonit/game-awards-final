// const gameCard = document.querySelector('.gameCard');
// const gameDescription = document.querySelector('.gameDescription');
// const gameTitle = document.querySelector('.gameTitle');
// const gameRating = document.querySelector('.gameRating');
// const gameButton = document.querySelector('.gameButton');

// gameCard.addEventListener('mouseenter', () => {
//     gameDescription.style.display = 'block';
//     gameTitle.style.display = 'block';
//     gameRating.style.display = 'block';
//     gameButton.style.display = 'block';
// });

// gameCard.addEventListener('mouseleave', () => {
//     gameDescription.style.display = 'none';
//     gameTitle.style.display = 'none';
//     gameRating.style.display = 'none';
//     gameButton.style.display = 'none';
// });

let LoginBtn = document.getElementById('LoginBtn');
window.onload = function () {

    let userData = localStorage.getItem('user');
    if (userData) {
        let user = JSON.parse(userData);
        console.log(user);
        LoginBtn.innerText = user.username;
        LoginBtn.setAttribute('title', 'Log Out');
    } else {
        console.log("No data found in local storage for the user")
        LoginBtn.setAttribute('title', 'Log In');
    }
}

LoginBtn.onclick = function () {
    if (localStorage.getItem('user')) {
        localStorage.removeItem('user');
    } else {
        console.log("No data found in local storage for the key user")
    }

}