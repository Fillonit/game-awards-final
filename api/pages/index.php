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
    <meta name="description" content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta name="theme-color" content="#11f285">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Nocturne - Game Reviews & Awards">
    <meta itemprop="description" content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta itemprop="image" content="http://game-awards.vercel.app/assets/img/noctlogo1.png">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://game-awards.vercel.app">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Nocturne - Game Reviews & Awards">
    <meta property="og:description" content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta property="og:image" content="http://game-awards.vercel.app/assets/img/noctlogo1.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nocturne - Game Reviews & Awards">
    <meta name="twitter:description" content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta name="twitter:image" content="http://game-awards.vercel.app/assets/img/noctlogo1.png">


    <link rel="shortcut icon" href="../../assets/img/nocticon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/script.js" defer></script>
</head>

<body>
    <div class="header">
        <!-- <img src="" alt="" class="logo"> -->
        <!-- <a href="/" class="logo"><h1 class="logo">Nocturne</h1></a> -->
        <a href="/api/pages/index.php" class="logo"><img src="../../assets/img/noctlogo1.png" alt="Nocturne"></a>
        <div class="nav">
            <a href="/api/pages/index.php">Home</a>
            <a href="/api/pages/about.php">About</a>
            <a href="/api/pages/contact.php">Contact</a>
            <a href="/api/pages/games.php">Games</a>
            <a href="/api/admin/dashboard.php" id="dashboardURL">Dashboard</a>
        </div>

        <a href="/api/user/login.php" id="loginLink"><button class="LoginBtn" id="LoginBtn"><span id="loggedInUser">Login</span> <i class="fa-solid fa-arrow-right-to-bracket"></i></button></a>
    </div>
    <div class="slideshow-container">

        <?php
        include '../../api/model/model.php';
        $model = new Model();
        $sliderDB = $model->getSliderImages();
        foreach ($sliderDB as $slide) { ?>
            <div class="mySlides fade">
                <img src="<?php echo $slide['imgURL'] ?>" style="width:100%" alt="sliderImage">
                <div class="text"><?php echo $slide['title'] ?></div>
            </div>
        <?php
        }
        ?>

        <!-- <div class="mySlides fade">
            <img src="https://cdn11.bigcommerce.com/s-1lneulkq0h/product_images/uploaded_images/ac-valhalla-landing-page-1920-x-500.png" style="width:100%" alt="sliderImage">
            <div class="text">ASSASSIN'S CREED: VALHALLA</div>
        </div>

        <div class="mySlides fade">
            <img src="https://cdn11.bigcommerce.com/s-nvm4ppzu5/product_images/uploaded_images/05-product-banner-l-1920-x-500px-cod-2.jpg" style="width:100%" alt="sliderImage">
            <div class="text">Rick and Morty</div>
        </div>

        <div class="mySlides fade">
            <img src="https://preview.redd.it/r8ndjrgvgil41.png?auto=webp&s=9fbeb6d863c1e7189eb71a1aef94e5649be86a25" style="width:100%" alt="sliderImage">
            <div class="text">Hitman Absolution</div>
        </div> -->

        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>

    </div>
    <br>

    <div style="text-align:center">
    <?php
        foreach ($sliderDB as $key => $slide) { ?>
            <span class="dot" onclick="currentSlide(<?php echo $key+ 1 ?>)"></span>
        <?php
        }
    ?>
        <!-- <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
        <span class="dot" onclick="currentSlide(4)"></span>
        <span class="dot" onclick="currentSlide(5)"></span> -->
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
            <?php

            $rows = $model->getFeaturedGames();
            $i = 1;
            if (!empty($rows)) {
                foreach ($rows as $row) {
            ?>
                    <div class="gameCard" id="gameCard1">
                        <img src="<?php echo $row['imageURL']; ?>" alt="<?php echo $row['gameTitle']; ?>" class="gameImg">
                        <h1 class="gameTitle"">
                    <span class=" title"><?php echo $row['gameTitle']; ?></span>
                        </h1>
                        <h2 class="gameRating""><?php echo $row['gameRating']; ?></h2>
                    <a href=" /api/pages/game.php?id=<?php echo $row['id']; ?>"><button class="gameButton">Open Review</button></a>
                    </div>
            <?php
                }
            } else {
                echo "no data";
            }
            ?>
        </div>
    </main>
    <footer>
        <div class="footer-container">
            <p>&copy; <?php echo date("Y"); ?> Nocturne</p>
            <nav>
                <ul>
                    <li><a href="/api/pages/TOS.php">Terms of Use</a></li>
                    <!-- <li><a href="#">Privacy Policy</a></li> -->
                    <li><a href="/api/pages/contact.php">Contact Us</a></li>
                    <li><a href="https://www.linkedin.com/in/fillonit-ibishi/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                    <li><a href="https://github.com/Fillonit" target="_blank"><i class="fab fa-github"></i></a></li>
                </ul>
            </nav>
        </div>
    </footer>
    <?php
    if (isset($_SESSION['isAdmin'])) {
        if ($_SESSION['isAdmin'] === 1) {
            echo "<script>
            document.getElementById('dashboardURL').style.visibility = 'visible';
            document.getElementById('dashboardURL').style.display = 'inline';
            </script>";
        } else {
            echo "<script>
            document.getElementById('dashboardURL').style.visibility = 'hidden';
            document.getElementById('dashboardURL').style.display = 'none';
            </script>";
        }
    } else {
        echo "<script>
            document.getElementById('dashboardURL').style.visibility = 'hidden';
            document.getElementById('dashboardURL').style.display = 'none';
            </script>";
    }

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        echo "<script>
        let user = document.getElementById('loggedInUser');
        user.innerText = '$username';
        let LoginBtn = document.getElementById('LoginBtn');
        LoginBtn.setAttribute('title', 'Edit Profile');
        </script>";
        echo "<script>
        let loginLink = document.getElementById('loginLink');
        loginLink.href = '/api/user/editProfile.php';
        </script>";
    } else {
        echo "<script>
        let LoginBtn = document.getElementById('LoginBtn');
        LoginBtn.setAttribute('title', 'Log In');
        </script>";
    }
    ?>
</body>

</html>