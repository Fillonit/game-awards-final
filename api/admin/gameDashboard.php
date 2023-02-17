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
    <!-- Header with website title on the left and username on the right -->
    <header>
        <a href="/api/admin/dashboard.php"><h2>Nocturne</h2></a>
        <p><a href="logout.php"><b><?= $_SESSION['username'] ?> <i class="fa-solid fa-right-from-bracket"></i></b></a></p>
    </header>

    <!-- Table with user details -->
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
        <a href="dashboard.php">
            <button class="btn add-btn">
            <i class="fa-solid fa-users"></i>
                Users Dashboard
            </button>
        </a>
    </center>
    <table>
        <tr>
            <th>Title</th>
            <th>Rating</th>
            <th>ImageURL</th>
            <th>Last Edited By</th>
            <th>Actions</th>
        </tr>
        <?php

        include '../../api/model/model.php';
        $model = new Model();
        $rows = $model->fetchGames();
        $i = 1;
        if (!empty($rows)) {
            foreach ($rows as $row) {
        ?>
                <tr>
                    <td><?php echo $row['gameTitle']; ?></td>
                    <td><?php echo $row['gameRating']; ?></td>
                    <td><?php echo $row['imageURL']; ?></td>
                    <td><?php echo $row['lastEditBy']; ?></td>
                    <td>
                        <a href="editGame.php?id=<?php echo $row['id']; ?>">
                            <button class="btn edit-btn">
                                <i class="fas fa-pencil-alt"></i>
                            </button>
                        </a>
                        <a href="deleteGame.php?id=<?php echo $row['id']; ?>">
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