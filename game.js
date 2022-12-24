/* 
    Quick and dirty inserting div's with different images.
    Faster dan manually adding divs + css nth-child(x) with bg images.
*/
(function () {
    const steamCards = document.querySelector('.js-steamCards');

    // Create array with images
    const listImages = [
        "https://i.postimg.cc/C5NMN512/steam-card-2.jpg",
        "https://i.postimg.cc/prxXzz28/steam-card-1.jpg",
        "https://i.postimg.cc/rFfFRD70/steam-card-4.jpg",
        "https://i.postimg.cc/SsbybCY5/steam-card-5.jpg",
        "https://i.postimg.cc/YSWpPb0Y/steam-card-6.jpg",
        "https://i.postimg.cc/W1KNSQNs/steam-card-8.jpg",
        "https://i.postimg.cc/L698stQF/steam-card-9.jpg",
        "https://i.postimg.cc/Jn3Rr0bh/steam-card-10.jpg",
        "https://i.postimg.cc/tC49bX7X/steam-card-11.jpg",
        "https://i.postimg.cc/zfKr7v2k/steam-card-12.jpg",
        "https://i.postimg.cc/HnpdVm29/steam-card-13.jpg",
        "https://i.postimg.cc/T1CGbsNM/steam-card-14.jpg",
        "https://i.postimg.cc/BZcvsYgC/steam-card-7.jpg",
        "https://i.postimg.cc/05f9h6kW/steam-card-15.jpg",
        "https://i.postimg.cc/pXcRXgnK/steam-card-16.jpg",
        "https://i.postimg.cc/GmBrBqkV/steam-card-17.jpg",
        "https://i.postimg.cc/jSGTyPc5/steam-card-18.jpg",
        "https://i.postimg.cc/85GV0Gqg/steam-card-19.jpg",
        "https://i.postimg.cc/TwcX8S6L/steam-card-20.jpg"
    ];

    let imagesTotal = listImages.length ? listImages.length : 0;

    // Loop through array and create cards with different images.
    for (let i = 0; i < imagesTotal; i++) {
        steamCards.insertAdjacentHTML('beforeend', `<div class="d-steam-card-wrapper"><div class="d-steam-card js-steamCard" style="background-image: url('${listImages[i]}')"></div></div>`);
    }
})();