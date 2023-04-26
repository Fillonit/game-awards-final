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
    <header>
    <a href="/api/admin/dashboard.php"><h2>Nocturne</h2></a>
        <p><a href="logout.php"><b><?= $_SESSION['username'] ?> <i class="fa-solid fa-right-from-bracket"></i></b></a></p>
    </header>

    <div>
        <?php
        // include '../../api/model/model.php';
        require_once(__DIR__ . '/../model/model.php');
        $model = new Model();
        $lastEditBy = $_SESSION['username'];
        $insert = $model->addUser($lastEditBy);
        ?>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Username</label><br />
                <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Password</label><br />
                <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="">isAdmin?</label><br />
                <input type="text" name="isAdmin" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn edit-btn"><i class="fa-solid fa-user-plus"></i> Add User</button>
            </div>
        </form>
    </div>
</body>

</html>