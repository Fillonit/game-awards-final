<?php
session_start();

// include '../../api/model/model.php';
require_once(__DIR__ . '/../model/model.php');
$model = new Model();
$id = $_REQUEST['id'];
$gameID = $_REQUEST['gameID'];
$validation = $model->validateCommentOwner($id, $_SESSION['username']);

if ($_SESSION['isAdmin'] !== 1 && $validation !== true) {
    echo "<script>window.location.href = '/api/pages/index.php';</script>";
}
?>
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

    <link rel="stylesheet" href="../../assets/css/edit.css">
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
            //   include '../../api/model/model.php';
            //   $model = new Model();
            //   $id = $_REQUEST['id'];
              $row = $model->editComment($id);
 
              if (isset($_POST['update'])) {
                if (isset($_POST['username']) && isset($_POST['comment'])) {
                     
                    $data['id'] = $id;
                    $data['username'] = $_POST['username'];
                    $data['comment'] = $_POST['comment'];
                    
                    $prevURL = '/api/pages/game.php?id='.$gameID;
 
                    $update = $model->updateComment($data);
 
                    if($update){
                      echo "<script>alert('record update successfully');</script>";
                      echo "<script>window.location.href = '$prevURL';</script>";
                    }else{
                      echo "<script>alert('record update failed');</script>";
                      echo "<script>window.location.href = '$prevURL';</script>";
                    }
 
                  }else{
                    echo "<script>alert('empty');</script>";
                    header("Location: editComment.php?id=$id");
                  }
                }
          ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="">Username</label>
              <input type="text" name="username" value="<?php echo $row['username']; ?>" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
              <label for="">Comment</label>
              <input type="text" name="comment" value="<?php echo $row['comment']; ?>" class="form-control" autocomplete="off">
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