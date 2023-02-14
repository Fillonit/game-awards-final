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


    <link rel="shortcut icon" href="assets/img/nocticon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../gameDetail.css">
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
            <a href="/api/dashboard.php" id="dashboardURL">Dashboard</a>
        </div>

        <a href="/api/login.php"><button class="LoginBtn" id="LoginBtn"><span id="loggedInUser">Login</span> <i class="fa-solid fa-arrow-right-to-bracket"></i></button></a>
    </div>
    </div>
    <main>
        <div class="game-container">
            <div class="game-image">
                <img src="https://expatguideturkey.com/wp-content/uploads/2023/01/gta-5-how-many-gb-here-are-the-gta-v-system-requirements-2023-780x470.webp" alt="Game Image">
            </div>
            <section class="game-info">
                <h2>Game Information</h2>
                <p>Title: <span>Grand Theft Auto V</span></p><br />
                <p>Genre: <span>Action-Adventure</span></p><br />
                <p>Developer: <span>Rockstar North</span></p><br />
                <p>Publisher: <span>Rockstar Games</span></p><br />
                <p>Release Date: <span>September 17, 2013<span></p><br />
                <p>Platforms: <span>PS 3, Xbox 360, PS 4, Xbox One, PC</span></p>
            </section>

        </div>

        <section>
            <h2>Game Description</h2>
            <p>Grand Theft Auto V is a 2013 action-adventure game developed by Rockstar North and published by Rockstar Games. The game is set in the fictional city of Los Santos, based on Los Angeles, and follows three criminals as they perform heists and other missions. Grand Theft Auto V offers players a massive open-world environment to explore, filled with various side missions, random events, and dynamic content.</p>
        </section>

        <h2>Screenshots</h2>
        <section class="screenshots">
            <img src="https://cdn.akamai.steamstatic.com/steam/apps/271590/ss_32aa18ab3175e3002217862dd5917646d298ab6b.600x338.jpg?t=1671485100" alt="Grand Theft Auto V Screenshot 1">
            <img src="https://cdn.akamai.steamstatic.com/steam/apps/271590/ss_bc5fc79d3366c837372327717249a4887aa46d63.600x338.jpg?t=1671485100" alt="Grand Theft Auto V Screenshot 2">
            <img src="https://cdn.akamai.steamstatic.com/steam/apps/271590/ss_d2eb9d3e50f9e4cb8db37d2976990b3795da8187.600x338.jpg?t=1671485100" alt="Grand Theft Auto V Screenshot 3">
        </section>

        <h2>Trailer</h2>
        <section class="video">
            <video width="50%" height="50%" no-controls autoplay loop muted src="https://cdn.akamai.steamstatic.com/steam/apps/256921436/movie_max_vp9.webm?t=1671116368">
                <!-- <source src="https://cdn.akamai.steamstatic.com/steam/apps/256921436/movie_max_vp9.webm?t=1671116368" type="video/webm" > -->
                Your browser does not support the video tag.
            </video>
        </section>

        <section class="reviews">
            <h2>Reviews</h2>
            <p>
                "Grand Theft Auto V is a masterpiece of a game, offering players a vast open-world environment filled with endless possibilities. The characters are well-written and engaging, and the missions are both challenging and satisfying. Overall, this is a must-play for any fan of action-adventure games."
            </p>
            <p>
                "This is one of the best games I have ever played. The open-world environment is huge and filled with interesting things to do, the graphics are stunning, and the storyline is engaging. Highly recommended!"
            </p>
        </section>
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
        </script>";
    }
    ?>
</body>

</html>