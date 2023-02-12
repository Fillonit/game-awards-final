<?php
session_start();

if(!isset($_SESSION['username'])) {
    header("Location: log_in.php");
}

if($_SESSION['isAdmin'] !== 1) {
  echo "<script>window.location.href = '/';</script>";
}

?>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Welcome, <?=$_SESSION['username']?></h1>
    <!-- Show the dashboard content here -->
</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
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
      .row {
          justify-content: center;
      }
      ::-moz-selection { /* Code for Firefox */
        color: white;
        background: black;
      }

      ::selection {
        color: white;
        background: black;
      }
      .btn {
          background-color: black;
          border-radius: 0px;
          border: 1px solid black;
          text-align: center;
          margin: 15px;
      }
      .btn:hover {
          background-color: white;
          color: black;
          border: 1px solid black;
      }
      .badge {
          border-radius: 0px;
      }
      a {
          text-decoration: none;
          color: darkslategray;
          font-weight: bold;
          padding-left: 2px;
          padding-right: 2px;
      }
      a:hover {
          background-color: darkslategray;
          color: white;
          /* font-weight: bold; */
          /* padding: 3px; */
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
        <center><div class="col-md-12"><a href="add.php" class="btn btn-primary">Add New</a></center>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile No.</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
 
                include 'model.php';
                $model = new Model();
                $rows = $model->fetch();
                $i = 1;
                if(!empty($rows)){
                  foreach($rows as $row){ 
              ?>
              <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td>
                  <a href="mailto:<?php echo $row['email'];?>"> <?php echo $row['email'];?></a>
                </td>
                <td>
                  <a href="tel:<?php echo $row['mobile'];?>"> <?php echo $row['mobile'];?></a>
                </td>
                <td>
                  <a href="https://www.google.com/maps/search/<?php echo $row['address'];?>" target="_blank"> <?php echo $row['address'];?></a>
                </td>
                <!-- <td><?php #echo $row['mobile']; ?></td> -->
                <!-- <td><?php #echo $row['address']; ?></td> -->
                <td>
                  <a href="delete.php?id=<?php echo $row['id']; ?>" class="badge badge-danger">Delete</a>
                  <a href="edit.php?id=<?php echo $row['id']; ?>" class="badge badge-success">Edit</a>
                </td>
              </tr>
 
              <?php
                }
              }else{
                echo "no data";
            }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
</body>
</html>
