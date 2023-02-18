<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noctus - Game Reviews & Awards</title>

    <link rel="shortcut icon" href="assets/img/nocticon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="contact.css"> -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <div class="header">
        <!-- <img src="" alt="" class="logo"> -->
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
    <style>
        /* Add some fancy styling to the page */
        body {
            /* background-color: lightblue; */
            /* font-family: Arial, sans-serif; */
            text-align: center;
            vertical-align: center;

        }

        h1 {
            color: white;
        }

        /* Add some style to the cards */
        .card {
            background-color: darkslategray;
            border-radius: 5px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            display: inline-block;
            margin: 20px;
            max-width: 300px;
            text-align: left;
        }

        /* Add some style to the card images */
        .card img {
            border-radius: 0px;
            width: 100%;
        }

        /* Add some style to the card text */
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
/*             margin-top: 80px; */
        }

        p {
            font-size: 20px;
            margin-top: 40px;
            margin-bottom: 40px;
        }

        /* Add some style to the cards */
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

        /* Add some style to the card images */
        .card img {
            border-radius: 5px 5px 0px 0px;
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        /* Add some style to the card text */
        .card p {
            font-size: 16px;
            padding: 10px;
        }
    </style>
    </head>

    <body>
        <main height="100vh" style="padding: 200px">
            <h1>About Us</h1>
            <p>Welcome to our website! We are a team of two creators who are passionate about building amazing things.
            </p>

            <!-- Add two cards to display the creators -->
            <div class="card">
                <!-- <img src="https://xsgames.co/randomusers/assets/avatars/male/20.jpg" alt="Creator 1"> -->
                <img src="https://cdn.discordapp.com/attachments/900517859699077211/1076217251486760990/image.png" alt="Creator 1">
                <p><strong>Fillonit Ibishi</strong></p>
                <p>Creator 1 is a talented software developer with a passion for building innovative solutions. He has a
                    wealth of experience in the tech industry and is always looking for new challenges.</p>
            </div>
            <div class="card">
                <!-- <img src="https://xsgames.co/randomusers/assets/avatars/male/21.jpg" alt="Creator 2"> -->
                <img src="https://cdn.discordapp.com/attachments/966126234075561994/1076163955665412156/image.png" alt="Creator 2">
                <p><strong>Drin Vitia</strong></p>
                <p>Creator 2 is a talented software developer with a passion for building innovative solutions. He has a
                    wealth of experience in the tech industry and is always looking for new challenges.</p>
            </div>
        </main>

    </body>

</html>