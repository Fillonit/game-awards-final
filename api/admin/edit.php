<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GameAwards - Nocturne | Database Managment</title>

    <link rel="shortcut icon" href="https://game-awards.vercel.app/assets/img/nocticon.png" type="image/x-icon">

    <!-- HTML Meta Tags -->
    <meta name="description"
        content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta name="theme-color" content="#11f285">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="Nocturne - Game Reviews & Awards">
    <meta itemprop="description"
        content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta itemprop="image" content="http://game-awards.vercel.app/assets/img/noctlogo1.png">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="https://game-awards.vercel.app">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Nocturne - Game Reviews & Awards">
    <meta property="og:description"
        content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta property="og:image" content="http://game-awards.vercel.app/assets/img/noctlogo1.png">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Nocturne - Game Reviews & Awards">
    <meta name="twitter:description"
        content="A game review and rating website. We like to rate our favorite games based on what they offer.">
    <meta name="twitter:image" content="http://game-awards.vercel.app/assets/img/noctlogo1.png">


    <style>
      .btn {
          background-color: black;
          border-radius: 0;
          border: 1px solid black;
          text-align: center;
          justify-self: center;
          align-self: center;
      }
      .btn:hover {
          background-color: white;
          color: black;
          border: 1px solid black;
      }
      .form-control {
          border-radius: 0px;
      }
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300&display=swap');

        body {
            background-color: #2D323B;
            margin-top: 10px;
            text-align: center;
            color: white;
            font-family: 'Roboto Condensed', sans-serif;
            font-size: 18px;
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
            margin-top: 20px;
        }

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
            font-family: 'Roboto Condensed', sans-serif;
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
    border: 2px solid white;
    padding: 5px;
    margin: 3px;
}

    </style>
 </head>
 <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">GameAwards - Nocturne | Database Managment</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php
              include 'model.php';
              $model = new Model();
              $id = $_REQUEST['id'];
              $row = $model->edit($id);
 
              if (isset($_POST['update'])) {
                if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['isAdmin'])) {
                     
                    $data['id'] = $id;
                    $data['username'] = $_POST['username'];
                    $data['password'] = $_POST['password'];
                    $data['isAdmin'] = $_POST['isAdmin'];
 
                    $update = $model->update($data);
 
                    if($update){
                      echo "<script>alert('record update successfully');</script>";
                      echo "<script>window.location.href = 'dashboard.php';</script>";
                    }else{
                      echo "<script>alert('record update failed');</script>";
                      echo "<script>window.location.href = 'dashboard.php';</script>";
                    }
 
                  }else{
                    echo "<script>alert('empty');</script>";
                    header("Location: edit.php?id=$id");
                  }
                }
          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="text" name="password" value="<?php echo $row['password']; ?>" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="">isAdmin?</label>
              <input type="text" name="isAdmin" value="<?php echo $row['isAdmin']; ?>" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <button type="submit" name="update" class="btn add-btn">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>