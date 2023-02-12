<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nocturne - Game Reviews & Awards</title>

    <!-- HTML Meta Tags -->
    <meta name="description"
        content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta name="theme-color" content="#11f285">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Nocturne - Game Reviews & Awards">
    <meta itemprop="description"
        content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta itemprop="image" content="http://game-awards.vercel.app/assets/img/noctlogo1.png">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://game-awards.vercel.app">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Nocturne - Game Reviews & Awards">
    <meta property="og:description"
        content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta property="og:image" content="http://game-awards.vercel.app/assets/img/noctlogo1.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nocturne - Game Reviews & Awards">
    <meta name="twitter:description"
        content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta name="twitter:image" content="http://game-awards.vercel.app/assets/img/noctlogo1.png">


    <link rel="shortcut icon" href="assets/img/nocticon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js" defer></script>
</head>

<body>
    <div class="header">
        <!-- <img src="" alt="" class="logo"> -->
        <!-- <a href="/" class="logo"><h1 class="logo">Nocturne</h1></a> -->
        <a href="/" class="logo"><img src="../assets/img/noctlogo1.png" alt="Nocturne"></a>
        <div class="nav">
            <a href="/">Home</a>
            <a href="/about.html">About</a>
            <a href="/contact.html">Contact</a>
            <a href="/games.html">Games</a>
        </div>

        <a href="/api/login.php"><button class="LoginBtn" id="LoginBtn"><span><?= $_SESSION['username'] ?></span> <i
            class="fa-solid fa-arrow-right-to-bracket"></i></button></a>
    </div>
    <div class="slideshow-container">

        <div class="mySlides fade">
            <img src="https://cdn11.bigcommerce.com/s-1lneulkq0h/product_images/uploaded_images/ac-valhalla-landing-page-1920-x-500.png"
                style="width:100%" alt="sliderImage">
            <div class="text">ASSASIN'S CREED: VALHALLA</div>
        </div>

        <div class="mySlides fade">
            <img src="https://cdn11.bigcommerce.com/s-nvm4ppzu5/product_images/uploaded_images/05-product-banner-l-1920-x-500px-cod-2.jpg"
                style="width:100%" alt="sliderImage">
            <div class="text">Rick and Morty</div>
        </div>

        <div class="mySlides fade">
            <img src="https://preview.redd.it/r8ndjrgvgil41.png?auto=webp&s=9fbeb6d863c1e7189eb71a1aef94e5649be86a25"
                style="width:100%" alt="sliderImage">
            <div class="text">Hitman Absolution</div>
        </div>

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
        }
    </script>
    </div>
    <main>
        <div class="topRatedGames">
            <div class="gameCard" id="gameCard1">
                <img src="https://image.api.playstation.com/vulcan/ap/rnd/202207/1210/4xJ8XB3bi888QTLZYdl7Oi0s.png"
                    alt="" class="gameImg">
                <h1 class="gameTitle"">
                    <span class=" title">God Of War Ragnarok</span>
                </h1>
                <h2 class="gameRating"">10</h2>
                <!-- <p class=" gameDescription"">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet placeat maiores iste adipisci
                    doloremque, quo reiciendis repellendus beatae tempore dolorum maxime. Delectus facilis deserunt
                    minus
                    aspernatur iure magnam minima quam.
                    </p> -->
                    <a href="/game.html?id=0"><button class="gameButton">Open Review</button></a>
            </div>
            <div class=" gameCard">
                <img src="https://4kwallpapers.com/images/wallpapers/elden-ring-2022-games-pc-games-playstation-4-xbox-series-x-1024x1024-7474.jpg"
                    alt="" class="gameImg">
                <h1 class="gameTitle">
                    <span class="title">Elden Ring</span>
                </h1>
                <h2 class="gameRating">10</h2>
                <!-- <p class="gameDescription">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet placeat maiores iste
                            adipisci
                            doloremque, quo reiciendis repellendus beatae tempore dolorum maxime. Delectus facilis
                            deserunt
                            minus
                            aspernatur iure magnam minima quam.
                        </p> -->
                <a href="/game.html?id=1"><button class="gameButton">Open Review</button></a>
            </div>
            <div class="gameCard">
                <img src="https://image.api.playstation.com/vulcan/ap/rnd/202211/1416/HXBxcRRNOpjREOW3GpBndz3u.png"
                    alt="" class="gameImg">
                <h1 class="gameTitle">
                    <span class="title">Assassin's Creed Valhalla</span>
                </h1>
                <h2 class="gameRating">8.4</h2>
                <!-- <p class="gameDescription">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet placeat maiores iste adipisci
                    doloremque, quo reiciendis repellendus beatae tempore dolorum maxime. Delectus facilis deserunt
                    minus
                    aspernatur iure magnam minima quam.
                </p> -->
                <a href="/game.html?id=2"><button class="gameButton">Open Review</button></a>
            </div>
            <div class="gameCard">
                <img src="https://image.api.playstation.com/vulcan/ap/rnd/202007/0917/fid2e7IysrUvFqmppIxi48GT.png"
                    alt="" class="gameImg">
                <h1 class="gameTitle">
                    <span class="title">Yakuza: Like A Dragon</span>
                </h1>
                <h2 class="gameRating">9.5</h2>
                <!-- <p class="gameDescription">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet placeat maiores iste adipisci
                    doloremque, quo reiciendis repellendus beatae tempore dolorum maxime. Delectus facilis deserunt
                    minus
                    aspernatur iure magnam minima quam.
                </p> -->
                <a href="/game.html?id=3"><button class="gameButton">Open Review</button></a>
            </div>
            <div class="gameCard">
                <img src="https://image.api.playstation.com/vulcan/ap/rnd/202104/0517/9AcM3vy5t77zPiJyKHwRfnNT.png"
                    alt="" class="gameImg">
                <h1 class="gameTitle">
                    <span class="title">Hades</span>
                </h1>
                <h2 class="gameRating">10</h2>
                <!-- <p class="gameDescription">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet placeat maiores iste adipisci
                    doloremque, quo reiciendis repellendus beatae tempore dolorum maxime. Delectus facilis deserunt
                    minus
                    aspernatur iure magnam minima quam.
                </p> -->
                <a href="/game.html?id=4"><button class="gameButton">Open Review</button></a>
            </div>
            <div class="gameCard">
                <img src="https://www.cloudgamingcatalogue.com/wp-content/uploads/2022/07/Stray.jpg" alt=""
                    class="gameImg">
                <h1 class="gameTitle">
                    <span class="title">Stray</span>
                </h1>
                <h2 class="gameRating">8.3</h2>
                <!-- <p class="gameDescription">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet placeat maiores iste adipisci
                    doloremque, quo reiciendis repellendus beatae tempore dolorum maxime. Delectus facilis deserunt
                    minus
                    aspernatur iure magnam minima quam.
                </p> -->
                <a href="/game.html?id=5"><button class="gameButton">Open Review</button></a>
            </div>
            <div class="gameCard">
                <img src="https://image.api.playstation.com/vulcan/ap/rnd/202205/2017/Ry0b7FGqNjHQvNRpRE9RjU3I.png"
                    alt="" class="gameImg">
                <h1 class="gameTitle">
                    <span class="title">Call of Duty: Modern Warfare II</span>
                </h1>
                <h2 class="gameRating">7.5</h2>
                <!-- <p class="gameDescription">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet placeat maiores iste adipisci
                    doloremque, quo reiciendis repellendus beatae tempore dolorum maxime. Delectus facilis deserunt
                    minus
                    aspernatur iure magnam minima quam.
                </p> -->
                <a href="/game.html?id=6"> <a href="/game.html?id="><button class="gameButton">Open
                            Review</button></a></a>
            </div>
            <div class="gameCard">
                <img src="https://www.nintendo.com/ph/switch/axb7/img/product.png" alt="" class="gameImg">
                <h1 class="gameTitle">
                    <span class="title">Bayonetta 3</span>
                </h1>
                <h2 class="gameRating">8.5</h2>
                <!-- <p class="gameDescription">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet placeat maiores iste adipisci
                    doloremque, quo reiciendis repellendus beatae tempore dolorum maxime. Delectus facilis deserunt
                    minus
                    aspernatur iure magnam minima quam.
                </p> -->
                <a href="/game.html?id=7"> <a href="/game.html?id="><button class="gameButton">Open
                            Review</button></a></a>
            </div>
        </div>
    </main>
    <footer>
        <div class="footer-container">
            <p>&copy; Copyright 2022</p>
            <nav>
                <ul>
                    <li><a href="/TOS.html">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="/contact.html">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </footer>
</body>

</html>