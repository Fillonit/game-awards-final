<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

if ($_SESSION['isAdmin'] !== 1) {
    echo "<script>window.location.href = '/';</script>";
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../assets/css/addUser.css">

</head>

<body>
    <!-- Header with website title on the left and username on the right -->
    <header>
    <a href="/api/admin/dashboard.php"><h2>Nocturne</h2></a>
        <p><a href="logout.php"><b><?= $_SESSION['username'] ?> <i class="fa-solid fa-right-from-bracket"></i></b></a></p>
    </header>

    <!-- Table with user details -->
    <div>
        <?php
        include '../../api/model/model.php';
        $model = new Model();
        $insert = $model->addGame();
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Game Title</label><br />
                <input type="text" name="gameTitle" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Game Rating</label><br />
                <input type="number" name="gameRating" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Image URL</label><br />
                <input type="text" name="imageURL" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn edit-btn"><i class="fa-solid fa-gamepad"></i> Add Game</button>
            </div>
        </form>
    </div>
</body>

</html>