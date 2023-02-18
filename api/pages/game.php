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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/gameDetail.css">
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

        <a href="/api/user/login.php"><button class="LoginBtn" id="LoginBtn"><span id="loggedInUser">Login</span> <i class="fa-solid fa-arrow-right-to-bracket"></i></button></a>
    </div>
    </div>
    <main>
        <div class="game-container">
            <?php
            include "../../api/model/model.php";
            $model = new Model();
            $id = $_GET['id'];
            if(!isset($_GET['id'])) {
                 echo '<script>alert("Please provide a valid ID")</script>';
                 echo '<script>window.location.href = "/api/pages/index.php"</script>';
            }
            $row = $model->getGameByID($id);
            $game = mysqli_fetch_array($row);
            if($game) {
                $video = $game['videoURL'];
            ?>
            <div class="game-image">
                <?php echo "<video width=\"100%\" height=\"100%\" no-controls autoplay loop muted src=\"$video\">"; ?>
            </div>
            <!-- <div class="divider"></div> -->
            <section class="game-info">
                <h2><span id="gameInfoText"> Game Information </span></h2>
                <p>Title: <span><?php echo $game['gameTitle'] ?></span></p><br />
                <p>Genre: <span><?php echo join(", ", explode(',', $game['genre'])); ?></span></p><br />
                <p>Developer: <span><?php echo $game['developer'] ?></span></p><br />
                <p>Publisher: <span><?php echo $game['publisher'] ?></span></p><br />
                <p>Release Date: <span><?php echo date("d-m-Y", strtotime($game['releaseDate']));?><span></p><br />
                <p>Platforms: <span><?php echo join(", ", explode(',', $game['platforms'])); ?></span></p>
            </section>

        </div>

        <section>
            <h2><span> Game Description </span></h2>
            <p><?php echo $game['gameDescription']; ?></p>
        </section>

        <h2><span> Screenshots </span></h2>
        <section class="screenshots">
            <?php 
                $screenshots = $game['screenshots'];
                $screenshots = explode("|", $screenshots);
                foreach ($screenshots as $screenshot) {
                    echo "<img src=\"$screenshot\" alt=\"Screenshot\">";
                }
            ?>

            <!-- <img src="https://cdn.akamai.steamstatic.com/steam/apps/271590/ss_32aa18ab3175e3002217862dd5917646d298ab6b.600x338.jpg?t=1671485100" alt="Grand Theft Auto V Screenshot 1">
            <img src="https://cdn.akamai.steamstatic.com/steam/apps/271590/ss_bc5fc79d3366c837372327717249a4887aa46d63.600x338.jpg?t=1671485100" alt="Grand Theft Auto V Screenshot 2">
            <img src="https://cdn.akamai.steamstatic.com/steam/apps/271590/ss_d2eb9d3e50f9e4cb8db37d2976990b3795da8187.600x338.jpg?t=1671485100" alt="Grand Theft Auto V Screenshot 3"> -->
        </section>  

        <section class="reviews">
            <h2><span> Reviews </span></h2>
            <p>
               <?php echo $game['review']?>
            </p>
        </section>
    </main>
    <footer>
        <div class="footer-container">
            <p>&copy; Copyright <?php echo date("Y"); ?></p>
            <nav>
                <ul>
                    <li><a href="/api/pages/TOS.php">Terms of Use</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="/api/pages/contact.php">Contact Us</a></li>
                </ul>
            </nav>
        </div>
    </footer>
    <?php
    } else {
        echo '<script>alert("The game doesn\'t exist in our database.")</script>';
        echo '<script>window.location.href = "/api/pages/index.php"</script>';
    }
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