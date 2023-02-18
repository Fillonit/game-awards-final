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
        $query = "SELECT * FROM users";
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

        $query = "UPDATE users SET id='$data[id]', username='$data[username]', password='$data[password]', isAdmin='$data[isAdmin]' WHERE users.id='$data[id]'";

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

    public function addUser()
    {
        if (isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $isAdmin = $_POST['isAdmin'];

            $query = "INSERT INTO users(username, password, isAdmin) VALUES ('$username','$password', '$isAdmin')";
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

            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

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
}
