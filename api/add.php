<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <title>PHP Mysql OOP CRUD (Create, Read, Update and Delete)</title>

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
    </style>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-5">
          <h1 class="text-center">PHP Mysql OOP CRUD (Create, Read, Update and Delete)</h1>
          <hr style="height: 1px;color: black;background-color: black;">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 mx-auto">
          <?php
              include 'model.php';
              $model = new Model();
              $insert = $model->insert();
          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="username" class="form-control">
            </div>
            <div class="form-group">
              <label for="">password</label>
              <input type="text" name="password" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Mobile No.</label>
              <input type="text" name="mobile" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <textarea name="address" id="" cols="" rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
</body>
</html>