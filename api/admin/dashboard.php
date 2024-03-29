<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: /api/user/login.php");
}

if ($_SESSION['isAdmin'] !== 1) {
    echo "<script>window.location.href = '/api/pages/index.php';</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css">

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
    <script>
        function togglePassword(event) {
            let password = event.target;
            if (password.type === "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>

</head>

<body>
    <header style="height: 30px;">
        <!-- <a href="/api/pages/index.php">
            <h2>Nocturne</h2>
        </a> -->
        <a href="/api/pages/index.php" class="logo"><img src="../../assets/img/noctlogo1.png" alt="Nocturne"></a>
        <center>
            <a href="addUser.php">
                <button class="btn add-btn">
                    <i class="fa-solid fa-user-plus"></i>
                    Add a User
                </button>
            </a>
            <a href="addGame.php">
                <button class="btn add-btn">
                    <i class="fa-solid fa-gamepad"></i>
                    Add a Game
                </button>
            </a>
            <a href="gameDashboard.php">
                <button class="btn add-btn">
                    <i class="fa-solid fa-dungeon"></i>
                    Games Dashboard
                </button>
            </a>
            <a href="contactDashboard.php">
                <button class="btn add-btn">
                    <i class="fa-solid fa-address-book"></i>
                    Contact Dashboard
                </button>
            </a>
        </center>
        <p><a href="../user/logout.php"><b><?= $_SESSION['username'] ?> <i class="fa-solid fa-right-from-bracket"></i></b></a></p>
    </header>

    <?php
    // include '../../api/model/model.php';
    require_once(__DIR__ . '/../model/model.php');
    $model = new Model();
    $totalUsers = $model->getTotalUsers();
    $totalAdmins = $model->getTotalAdmins();
    $adminPercentage = round(($totalAdmins / $totalUsers) * 100);
    ?>

    <br />
    <div class="card-container">
        <div class="card">
            <h3><i class="fa-solid fa-users"></i> Total Users </h3>
            <?php
            echo "<p><span>$totalUsers</span> users</p>";
            ?>
        </div>

        <div class="card">
            <h3><i class="fa-solid fa-user-shield"></i> Admins </h3>
            <?php
            echo "<p><span>$totalAdmins</span> ($adminPercentage%)</p>";
            ?>
        </div>

        <div class="card">
            <h3><i class="fa-solid fa-chart-line"></i> Most Active Admin </h3>
            <?php
            $mostActiveAdmin = $model->getMostActiveAdminUsers();
            echo "<p><span>" . $mostActiveAdmin['username'] . "</span> (" . $mostActiveAdmin['total_edits'] . " edits)</p>";
            ?>
        </div>
    </div>
    <br />
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>isAdmin?</th>
            <th>Last Edited By</th>
            <th>Actions</th>
        </tr>
        <?php

        $rows = $model->fetch();
        $i = 1;
        if (!empty($rows)) {
            foreach ($rows as $row) {
        ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><input type="password" value="<?php echo $row['password']; ?>" onclick="togglePassword(event)" readonly /></td>
                    <td><?php echo $row['isAdmin']; ?></td>
                    <td><?php echo $row['lastEditBy']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>">
                            <button class="btn edit-btn">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>">
                            <button class="btn delete-btn">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "no data";
        }
        ?>
    </table>

    <script>
        document.querySelectorAll('input').forEach(function(input) {
            input.addEventListener('mouseenter', function() {
                this.type = "text";
            });
            input.addEventListener('mouseleave', function() {
                this.type = "password";
            });
        });
    </script>
</body>

</html>