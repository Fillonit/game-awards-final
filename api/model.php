<?php
    class Model{
        private $server = 'db4free.net';
        private $username = 'adminnocturne';
        private $password = '!es27MiQfAaWb_k';
        private $database = 'gamingawards';
        private $conn;

        public function __construct(){
            try{
                $this->conn = new mysqli($this->server, $this->username, $this->password, $this->database);
            }catch(Exception $ex){
                echo 'connection failed' .$ex->getMessage();
            }       
        }

        //INSERT, FETCH, EDIT, DELETE

        public function insert(){
            if(isset($_POST['submit'])){

                $name = $_POST['name'];//blerina
                $email = $_POST['email']; //blerina@ubt
                $mobile = $_POST['mobile'];
                $address = $_POST['address'];

                $query = "INSERT INTO user_tbl(name, email, mobile, address) VALUES ('$name','$email', '$mobile', '$address')";
                if ($sql = $this->conn->query($query)) {
                    echo "<script>alert('records added successfully');</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                }else{
                    echo "<script>alert('failed');</script>";
                    echo "<script>window.location.href = 'index.php';</script>";
                }
            }
        }

        
        public function fetch(){
            $data = null;
            $query = "SELECT * FROM users";
            if ($sql = $this->conn->query($query)) {
                while ($row = mysqli_fetch_assoc($sql)) {
                    $data[] = $row;
                }
            }
            return $data;
        }
 
        public function delete($id){
 
            $query = "DELETE FROM users where id = '$id'";
            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }
 
        public function edit($id){
 
            $data = null;
 
            $query = "SELECT * FROM users WHERE id = '$id'";
            if ($sql = $this->conn->query($query)) {
                while($row = $sql->fetch_assoc()){
                    $data = $row;
                    echo "<script>alert('$data')</script>";
                }
            }
            return $data;
        }
 
        public function update($data){
 
            $query = "UPDATE users SET id='$data[id]', username='$data[username]', password='$data[password]', isAdmin='$data[isAdmin]' WHERE id='$data[id]'";
            echo "<script>alert('$query')</script>";
 
            if ($sql = $this->conn->query($query)) {
                return true;
            }else{
                return false;
            }
        }

        public function login($username, $password){
 
            $data = null;
 
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            if ($sql = $this->conn->query($query)) {
                while($row = $sql->fetch_assoc()){
                    $data = $row;
                }
            }
            if($data != null) {
            return(json_encode($data));
            } else {
                return `Incorrect username or password.`;
            }
        }

        public function getUser($username, $password){
            $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
            $result = $this->conn->query($query);
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            }
            return null;
        }
    }
