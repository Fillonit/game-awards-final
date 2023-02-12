<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: log_in.php");
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
            background-color: #2D323B;
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

        th,
        td {
            border: 1px solid lightgray;
            padding: 10px 15px;
            text-align: left;
            background-color: white;
        }

        th {
            background-color: lightgray;
            font-weight: bold;
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


        /* .edit-btn i,
        .delete-btn i {
            margin-right: 5px;
        } */

        table th:last-child,
        table td:last-child {
            width: 100px;
            text-align: center;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table th {
            background-color: #0eca6f;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #333;
            color: #fff;
            font-family: 'Oswald', sans-serif;
        }

        table,
        table th,
        table td {
            border: none;
        }

        table th tr:nth-child(even) {
            background-color: #333;
        }

        table th tr:nth-child(odd) {
            background-color: #444;
        }

        table td {
            background-color: #1C1D1F;
        }

        p a {
            text-decoration: none;
            color: white;
            font-size: 18px;
        }

        input {
            background-color: transparent;
            color: white;
            border: none;
        }
    </style>
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
        <h2>Nocturne</h2>
        <p><a href="logout.php"><b><?= $_SESSION['username'] ?> <i class="fa-solid fa-right-from-bracket"></i></b></a></p>
    </header>

    <!-- Table with user details -->
    <center>
        <a href="add.php">
            <button class="btn add-btn">
                <i class="fa-solid fa-user-plus"></i>
                Add a User
            </button>
        </a>
    </center>
    <table>
        <tr>
            <th>Username</th>
            <th>Password</th>
            <th>isAdmin?</th>
            <th>Actions</th>
        </tr>
        <?php

        include 'model.php';
        $model = new Model();
        $rows = $model->fetch();
        $i = 1;
        if (!empty($rows)) {
            foreach ($rows as $row) {
        ?>
                <tr>
                    <td><?php echo $row['username']; ?></td>
                    <td><input type="password" value="<?php echo $row['password']; ?>" onclick="togglePassword(event)" /></td>
                    <td><?php echo $row['isAdmin']; ?></td>
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