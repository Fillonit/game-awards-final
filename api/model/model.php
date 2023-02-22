<?php
class Model
{
    private $server = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'gameawards';
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
        } catch (Exception $ex) {
            echo 'connection failed' . $ex->getMessage();
        }
    }

    //INSERT, FETCH, EDIT, DELETE


    public function editUserCredentials($username, $userID, $newUsername, $newPassword)
{
    if ($username !== $newUsername) {
        if ($this->userExists($newUsername)) {
            echo "<script>alert('Username already exists');</script>";
            return false;
        }
    }

    // update user credentials in database
    $query = "UPDATE users SET username = '$newUsername', password = '$newPassword', lastEditBy = '$username' WHERE id = '$userID'";
    if ($result = $this->conn->query($query)) {
        return true;
    } else {
        return false;
    }
}


    public function userExists($username)
    {
        $query = "SELECT COUNT(*) as user_count FROM users WHERE username = '$username'";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }

        $row = $result->fetch_assoc();
        $user_count = $row['user_count'];

        return ($user_count > 0);
    }


    public function insert()
    {
        // if(isset($_POST['submit'])){

        $username = $_POST['username'];
        $password = $_POST['password'];

        if (empty($username) || empty($password)) {
            echo "Please fill all the fields.";
            exit();
        }

        $query = "INSERT INTO users(username, password) VALUES ('$username', '$password')";
        if ($sql = $this->conn->query($query)) {
            echo "<script>alert('records added successfully');</script>";
            echo "<script>window.location.href = '/api/pages/index.php';</script>";
        } else {
            echo "<script>alert('failed');</script>";
            echo "<script>window.location.href = '/api/user/login.php';</script>";
        }
        // }
    }


    public function fetch()
    {
        $data = null;
        $query = "SELECT * FROM users ORDER BY isAdmin DESC";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($id)
    {

        $query = "DELETE FROM users where id = '$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {

        $data = null;

        $query = "SELECT * FROM users WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function update($data)
    {

        $query = "UPDATE users SET id='$data[id]', username='$data[username]', password='$data[password]', isAdmin='$data[isAdmin]', lastEditBy='$data[lastEditBy]' WHERE users.id='$data[id]'";

        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function login($username, $password)
    {

        $data = null;

        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        if ($data != null) {
            return (json_encode($data));
        } else {
            return `Incorrect username or password.`;
        }
    }

    public function getUser($username, $password)
    {
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }

    public function addUser($lastEditBy)
    {
        if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $isAdmin = $_POST['isAdmin'];

            $query = "INSERT INTO users(username, password, isAdmin, lastEditBy) VALUES ('$username','$password', '$isAdmin', '$lastEditBy')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('records added successfully');</script>";
                echo "<script>window.location.href = '/api/admin/dashboard.php';</script>";
            } else {
                echo "<script>alert('failed');</script>";
                echo "<script>window.location.href = '/api/admin/dashboard.php';</script>";
            }
        }
    }

    public function getGames()
    {
        $data = null;
        $query = "SELECT * FROM gamesList";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function contactMail()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $name = mysqli_real_escape_string($this->conn, $_POST['name']);
            $email = $_POST['email'];
            $message = mysqli_real_escape_string($this->conn, $_POST['message']);

            if (empty($name) || empty($message) || empty($email)) {
                echo "Please fill all the fields.";
                exit();
            }

            $query = "INSERT INTO contact(name, email, message) VALUES ('$name', '$email', '$message')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('Contact Message has been sent successfully');</script>";
                echo "<script>window.location.href = '/api/pages/index.php';</script>";
            } else {
                echo "<script>alert('failed');</script>";
                echo "<script>window.location.href = '/api/user/index.php';</script>";
            }
        }
    }

    public function addGame($username)
    {
        if (isset($_POST['submit'])) {

            // $gameTitle = $_POST['gameTitle'];
            $gameTitle = mysqli_real_escape_string($this->conn, $_POST['gameTitle']);
            $gameRating = mysqli_real_escape_string($this->conn, $_POST['gameRating']);
            $imageURL = mysqli_real_escape_string($this->conn, $_POST['imageURL']);
            $videoURL = mysqli_real_escape_string($this->conn, $_POST['videoURL']);
            $genre = mysqli_real_escape_string($this->conn, $_POST['genre']);
            $developer = mysqli_real_escape_string($this->conn, $_POST['developer']);
            $publisher = mysqli_real_escape_string($this->conn, $_POST['publisher']);
            $releaseDate = mysqli_real_escape_string($this->conn, $_POST['releaseDate']);
            $platforms = mysqli_real_escape_string($this->conn, $_POST['platforms']);
            $gameDescription = mysqli_real_escape_string($this->conn, $_POST['gameDescription']);
            $screenshots = mysqli_real_escape_string($this->conn, $_POST['screenshots']);
            $review = mysqli_real_escape_string($this->conn, $_POST['review']);

            $query = "INSERT INTO gamesList(gameTitle, gameRating, imageURL, videoURL, genre, developer, publisher, releaseDate, platforms, gameDescription, screenshots, review, lastEditBy) VALUES ('$gameTitle', '$gameRating', '$imageURL', '$videoURL', '$genre', '$developer', '$publisher', '$releaseDate', '$platforms', '$gameDescription', '$screenshots', '$review', '$username')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('records added successfully');</script>";
                echo "<script>window.location.href = '/api/pages/index.php';</script>";
            } else {
                echo "<script>alert('failed');</script>";
                echo "<script>window.location.href = '/api/pages/dashboard.php';</script>";
            }
        }
    }

    public function fetchGames()
    {
        $data = null;
        $query = "SELECT * FROM gamesList";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getGameByID($gameID)
    {
        $data = null;
        $query = "SELECT * FROM gamesList WHERE id = '$gameID'";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

    public function fetchComments($gameID)
    {
        $data = null;
        $query = "SELECT * FROM comments WHERE gameID = $gameID ORDER BY createdAt DESC";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function insertComment($gameID, $username)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $comment = mysqli_real_escape_string($this->conn, $_POST['comment']);

            $query = "INSERT INTO comments(gameID, username, comment) VALUES ('$gameID', '$username', '$comment')";
            if ($sql = $this->conn->query($query)) {
                echo "<script>alert('comment has been sent successfully');</script>";
                // echo "<script>window.location.href = '/api/pages/index.php';</script>";
            } else {
                echo "<script>alert('failed');</script>";
                // echo "<script>window.location.href = '/api/user/index.php';</script>";
            }
        }
    }

    public function editComment($id)
    {

        $data = null;

        $query = "SELECT * FROM comments WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function updateComment($data)
    {

        $query = "UPDATE comments SET id='$data[id]', username='$data[username]', comment='$data[comment]' WHERE comments.id='$data[id]'";

        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteComment($id)
    {

        $query = "DELETE FROM comments where id = '$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
    public function getCommentById($id)
    {
        $query = "SELECT * FROM comments WHERE id = '$id'";
        $result = $this->conn->query($query);
        if ($result->num_rows == 1) {
            return $result->fetch_assoc();
        } else {
            echo "<script>alert('failed');</script>";
            return false;
        }
    }

    public function validateCommentOwner($id, $username)
    {
        if (!isset($username)) {
            return false;
        }
        $query = "SELECT * FROM comments WHERE id='$id'";
        $result = $this->conn->query($query);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($row['username'] == $username) {
                return true;
            }
        }
        return false;
    }

    public function getContactMessages()
    {
        $data = null;
        $query = "SELECT * FROM contact";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function getTotalUsers()
    {
        $query = "SELECT COUNT(*) AS total_users FROM users";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }

        $row = $result->fetch_assoc();
        $total_users = $row['total_users'];

        return $total_users;
    }


    public function getTotalAdmins()
    {
        $query = "SELECT COUNT(*) AS total_admins FROM users WHERE isAdmin = '1'";
        if ($sql = $this->conn->query($query)) {
            $row = mysqli_fetch_assoc($sql);
            $total_admins = $row['total_admins'];
        }
        return $total_admins;
    }

    public function getMostActiveAdminUsers()
    {
        $query = "SELECT lastEditBy, COUNT(*) as total_edits FROM users GROUP BY lastEditBy ORDER BY total_edits DESC LIMIT 1";
        if ($sql = $this->conn->query($query)) {
            $row = mysqli_fetch_assoc($sql);
            $most_active_admin = $row['lastEditBy'];
            $total_edits = $row['total_edits'];
        }
        return array('username' => $most_active_admin, 'total_edits' => $total_edits);
    }

    public function getMostRecentGame()
    {
        $query = "SELECT * FROM gameslist ORDER BY releaseDate DESC LIMIT 1";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }

        $row = $result->fetch_assoc();
        $most_recent_game = $row['gameTitle'];

        return $most_recent_game;
    }

    public function fetchGamesCount()
    {
        $query = "SELECT COUNT(*) AS total_games FROM gameslist";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }

        $row = $result->fetch_assoc();
        $total_games = $row['total_games'];

        return $total_games;
    }


    public function getMostCommonGameRating()
    {
        $query = "SELECT gameRating, COUNT(*) as rating_count FROM gameslist GROUP BY gameRating ORDER BY rating_count DESC LIMIT 1";
        if ($sql = $this->conn->query($query)) {
            $row = mysqli_fetch_assoc($sql);
            $most_common_rating = $row['gameRating'];
            $rating_count = $row['rating_count'];
        }
        $total_games = $this->fetchGamesCount();
        $most_common_rating_percentage = round(($rating_count / $total_games) * 100, 2);
        return array('gameRating' => $most_common_rating, 'count' => $rating_count, 'percentage' => $most_common_rating_percentage);
    }



    public function getMostActiveAdminGames()
    {
        $query = "SELECT lastEditBy, COUNT(*) as total_edits FROM gameslist GROUP BY lastEditBy ORDER BY total_edits DESC LIMIT 1";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Error executing query: " . $this->conn->error);
        }

        $row = $result->fetch_assoc();
        $most_active_admin = $row['lastEditBy'];
        $total_edits = $row['total_edits'];

        return array('username' => $most_active_admin, 'total_edits' => $total_edits);
    }

    public function editGame($id)
    {

        $data = null;

        $query = "SELECT * FROM gameslist WHERE id = '$id'";
        if ($sql = $this->conn->query($query)) {
            while ($row = $sql->fetch_assoc()) {
                $data = $row;
            }
        }
        return $data;
    }

    public function updateGame($data)
    {

        $gameDescription = mysqli_real_escape_string($this->conn, $data['gameDescription']);
        $review = mysqli_real_escape_string($this->conn, $data['review']);
        $developer = mysqli_real_escape_string($this->conn, $data['developer']);
        $publisher = mysqli_real_escape_string($this->conn, $data['publisher']);

        // $query = "UPDATE gameslist SET id='$data[id]', gameTitle='$data[gameTitle]', gameDescription='$data[gameDescription]', gameRating='$data[gameRating]', imgURL='$data[imgURL]', videoURL='$data[videoURL]', genre='$data[genre]', developer='$data[developer]', publisher='$data[publisher]', platforms='$data[platforms]', screenshots='$data[screenshots]', review='$data[review]', releaseDate='$data[releaseDate]', lastEditBy='$data[lastEditBy]' WHERE gameslist.id='$data[id]'";
        $query = "UPDATE gameslist SET id='$data[id]', gameTitle='$data[gameTitle]', gameDescription='$gameDescription', gameRating='$data[gameRating]', imageURL='$data[imageURL]', videoURL='$data[videoURL]', genre='$data[genre]', developer='$developer', publisher='$publisher', platforms='$data[platforms]', screenshots='$data[screenshots]', review='$review', releaseDate='$data[releaseDate]', lastEditBy='$data[lastEditBy]' WHERE gameslist.id='$data[id]'";

        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteGame($id)
    {

        $query = "DELETE FROM gameslist where id = '$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteContactMessage($id)
    {

        $query = "DELETE FROM contact where id = '$id'";
        if ($sql = $this->conn->query($query)) {
            return true;
        } else {
            return false;
        }
    }

    public function getAuthors()
    {
        $data = null;
        $query = "SELECT * FROM authors ORDER BY name DESC";
        if ($sql = $this->conn->query($query)) {
            while ($row = mysqli_fetch_assoc($sql)) {
                $data[] = $row;
            }
        }
        return $data;
    }
}
