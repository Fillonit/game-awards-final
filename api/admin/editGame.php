<?php
session_start();

// include '../../api/model/model.php';
require_once(__DIR__ . '/../model/model.php');
$model = new Model();

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

    <link rel="stylesheet" href="../../assets/css/addUser.css">

    <style>
        .form-left {
            width: 50%;
            float: left;
            padding-left: 15vw;
        }

        .form-right {
            width: 50%;
            float: right;
            padding-right: 15vw;
        }

        input {
            width: 400px;
        }

        .form:after {
            content: "";
            display: table;
            clear: both;
        }

        .edit-btn {
            margin-top: 10vh;
            scale: 1.5;
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
                //   include '../../api/model/model.php';
                //   $model = new Model();
                $id = $_REQUEST['id'];
                $row = $model->editGame($id);

                if (isset($_POST['update'])) {
                    if (isset($_POST['gameTitle']) && isset($_POST['gameRating']) && isset($_POST['imageURL']) && isset($_POST['videoURL']) && isset($_POST['genre']) && isset($_POST['developer']) && isset($_POST['publisher']) && isset($_POST['releaseDate']) && isset($_POST['gameDescription']) && isset($_POST['platforms']) && isset($_POST['screenshots']) && isset($_POST['review'])) {

                        $data['id'] = $id;
                        $data['gameTitle'] = $_POST['gameTitle'];
                        $data['gameRating'] = $_POST['gameRating'];
                        $data['imageURL'] = $_POST['imageURL'];
                        $data['videoURL'] = $_POST['videoURL'];
                        $data['genre'] = $_POST['genre'];
                        $data['developer'] = $_POST['developer'];
                        $data['publisher'] = $_POST['publisher'];
                        $data['releaseDate'] = $_POST['releaseDate'];
                        $data['gameDescription'] = $_POST['gameDescription'];
                        $data['platforms'] = $_POST['platforms'];
                        $data['screenshots'] = $_POST['screenshots'];
                        $data['review'] = $_POST['review'];
                        $data['lastEditBy'] = $_SESSION['username'];

                        $prevURL = '/api/admin/gameDashboard.php';


                        $update = $model->updateGame($data);

                        if ($update) {
                            echo "<script>alert('record update successfully');</script>";
                            echo "<script>window.location.href = '$prevURL';</script>";
                        } else {
                            echo "<script>alert('record update failed');</script>";
                            echo "<script>window.location.href = '$prevURL';</script>";
                        }
                    } else {
                        echo "<script>alert('empty');</script>";
                        header("Location: editGame.php?id=$id");
                    }
                }
                ?>
                <form action="" method="post">
                    <div class="form">
                        <div class="form-left">
                            <div class="form-group">
                                <label for="">Game Title</label><br />
                                <input type="text" name="gameTitle" class="form-control" value="<?php echo $row['gameTitle'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Game Rating</label><br />
                                <input type="number" name="gameRating" class="form-control" value="<?php echo $row['gameRating'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Image URL</label><br />
                                <input type="text" name="imageURL" class="form-control" value="<?php echo $row['imageURL'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Video URL</label><br />
                                <input type="text" name="videoURL" class="form-control" value="<?php echo $row['videoURL'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Genres</label><br />
                                <input type="text" name="genre" class="form-control" value="<?php echo $row['genre'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Developer</label><br />
                                <input type="text" name="developer" class="form-control" value="<?php echo $row['developer'] ?>">
                            </div>
                        </div>
                        <div class="form-right">
                            <div class="form-group">
                                <label for="">Publisher</label><br />
                                <input type="text" name="publisher" class="form-control" value="<?php echo $row['publisher'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Release Date</label><br />
                                <input type="date" name="releaseDate" class="form-control" max="<?php echo date('Y-m-d'); ?>" value="<?php echo $row['releaseDate']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Platforms</label><br />
                                <input type="text" name="platforms" class="form-control" value="<?php echo $row['platforms'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Game Description</label><br />
                                <input type="text" name="gameDescription" class="form-control" value="<?php echo $row['gameDescription'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Screenshots</label><br />
                                <input type="text" name="screenshots" class="form-control" value="<?php echo $row['screenshots'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Review</label><br />
                                <input type="text" name="review" class="form-control" value="<?php echo $row['review'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update" class="btn edit-btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>