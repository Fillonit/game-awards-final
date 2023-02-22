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
    <style>
        body {
            text-align: center;
            vertical-align: center;

        }

        h1 {
            color: white;
        }

        .card {
            background-color: darkslategray;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            display: inline-block;
            margin: 20px;
            max-width: 300px;
            text-align: left;
        }

        .card img {
            border-radius: 0px;
            width: 100%;
        }

        .card p {
            padding: 10px 20px;
        }

        body {
            background-color: #1c1c1c;
            color: white;
            font-family: Arial, sans-serif;
            text-align: center;
        }

        h1 {
            font-size: 48px;
        }

        p {
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #242424;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            display: inline-block;
            margin: 20px;
            max-width: 350px;
            height: 500px;
            text-align: left;
            vertical-align: top;
        }

        .card img {
            border-radius: 5px 5px 0px 0px;
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .card p {
            font-size: 16px;
        }

        .card {
            text-align: center;
        }

        .card strong {
            font-size: 30px;
            padding: 0;
            margin: 0;
        }
    </style>
    </head>

    <body>
        <main height="100vh" style="padding: 200px">
            <h1>About Us</h1>
            <p>Welcome to our website! We are a team of two creators who are passionate about building amazing things.
            </p>

            <?php

            include '../../api/model/model.php';
            $model = new Model();
            $rows = $model->getAuthors();
            $i = 1;
            if (!empty($rows)) {
                foreach ($rows as $row) {
            ?>
                    <div class="card">
                        <!-- <img src="https://xsgames.co/randomusers/assets/avatars/male/20.jpg" alt="Creator 1"> -->
                        <img src="<?php echo $row['imgURL'] ?>" alt="Creator 1">
                        <p><strong><?php echo $row['name'] ?></strong></p>
                        <p><?php echo $row['name'];
                            echo $row['bio'] ?></p>
                    </div>
            <?php
                }
            } else {
                echo "no data";
            }
            ?>
        </main>
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