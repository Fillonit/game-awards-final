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

    <link rel="shortcut icon" href="assets/img/nocticon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/contact.css">
    <script src="../../assets/js/contact.js" defer></script>
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

        <a href="/api/user/login.php"><button class="LoginBtn" id="LoginBtn"><span id="loggedInUser">Login</span> <i
                    class="fa-solid fa-arrow-right-to-bracket"></i></button></a>
    </div>
    <h1 id="bigText">Contact Us</h1>
    <?php
    include '../../api/model/model.php';
    $model = new Model();
    $insert = $model->contactMail();
    ?>
    <div class="map">
        <iframe
            src="https://maps.google.com/maps?q=ubt%20emshir&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
            id="gmap_canvas" frameborder="0" scrolling="no" style="width: 700px; height: 350px;"></iframe>
    </div>
    <form onsubmit="validate();" method="POST" action="contact.php">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" name="message" rows="5" placeholder="Enter your message"
                id="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <br>
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
        LoginBtn.setAttribute('title', 'Log Out');
        </script>";
        echo "<script>
        let loginLink = document.getElementById('loginLink');
        loginLink.href = '/api/user/logout.php';
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