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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');

        body {
            background-color: #2C2C2C;
            margin-top: 80px;
        }

        /* Style for the header */
        header {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: #1C1D1F;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: Arial, sans-serif;
            z-index: 1;
            box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.1);
        }

        header h2,
        header p {
            margin: 0;
            color: white;
        }

        * {
            box-sizing: border-box;
        }

        body {
            text-align: center;
            font-family: 'Roboto Condensed', sans-serif;
            color: white;
        }

        label {
            font-size: 26px;
        }

        label:hover {
            color: #11f285;
        }

        input {
            padding: 5px;
            width: 15%;
            border: none;
            border-bottom: 3px solid #11f285;
            background: white;
            color: #1C1D1F;
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 18px;
            /*     box-shadow: 1px 1px 5px 5px#11f285 !important; */
            box-shadow: 0 0 15px 4px rgba(0, 0, 0, 0.3);
            margin: 10px 0;
        }



        /* Style for the buttons */
        .btn {
            background-color: transparent;
            border: none;
            cursor: pointer;
            font-size: 16px;
            outline: none;
            padding: 0;
            border-radius: 0px;
        }

        .edit-btn {
            background-color: #0eca6f;
            color: white;
            padding: 6px 10px;
        }

        .delete-btn {
            background-color: #e74c3c;
            color: white;
            padding: 6px 10px;
        }

        .add-btn {
            background-color: #1C1D1F;
            color: white;
            padding: 10px 14px;
            font-size: 20px;
        }




        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        p a {
            text-decoration: none;
            color: white;
            font-size: 18px;
        }
    </style>

</head>

<body>
    <!-- Header with website title on the left and username on the right -->
    <header>
        <h2>Nocturne</h2>
        <p><a href="logout.php"><b><?= $_SESSION['username'] ?> <i class="fa-solid fa-right-from-bracket"></i></b></a></p>
    </header>

    <!-- Table with user details -->
    <div>
        <?php
        include 'model.php';
        $model = new Model();
        $insert = $model->addUser();
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