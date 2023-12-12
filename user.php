<?php 

class User {
    // public $username = "";
    public $email = "";
    public $password = "";
    public $password_hash = "";
    public $token = "";
    public $auth = false;
    private $conn;

    // assume the username and password are not safe
    function __construct($conn, $email, $password) {
        // $this->username = mysqli_real_escape_string($conn, $username);
        $this->email = mysqli_real_escape_string($conn, $email);
        $this->password = mysqli_real_escape_string($conn, $password);

        $this->token = md5(rand().time());
        // encrypts the password
        $this->password_hash = password_hash($password, PASSWORD_BCRYPT);

        $this->conn = $conn;
    }

    // turns the objects from __construct into a string
    // only needed for debugging
    function __toString() {
        return $this->email . "<br />" . $this->password . "<br />" . $this->password_hash;
    }

    // add data to table
    // does not add password in plain text - adds the encrypted one
    // function insert() {
    //     $sql = "
    //     INSERT INTO users (
    //         email, 
    //         password,
    //         token,
    //         is_active
    //     ) VALUES (
    //         '{$this->email}',
    //         '{$this->password_hash}',
    //         '{$this->token}',
    //         '0'
    //     )";
    //     // username, 
    //     // '{$this->username}',

    //     // create MySQL query
    //     $sqlQuery = $this->conn->query($sql);

    //     if (!$sqlQuery){
    //         die("MySQL query failed" . mysqli_error($this->conn));
    //     }
    // }

    function insert() {
        // Validate and sanitize user input
        $email = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        $password = $this->sanitise($this->password_hash);
        $token = $this->sanitise($this->token);
    
        // Check if the email is valid
        if (!$email) {
            die("Invalid email address");
        }
    
        // Escape the values to prevent SQL injection
        $email = $this->conn->real_escape_string($email);
        $password = $this->conn->real_escape_string($password);
        $token = $this->conn->real_escape_string($token);
    
        $sql = "
        INSERT INTO users (
            email, 
            password,
            token,
            is_active
        ) VALUES (
            '{$email}',
            '{$password}',
            '{$token}',
            '0'
        )";
    
        // create MySQL query
        $sqlQuery = $this->conn->query($sql);
    
        if (!$sqlQuery){
            die("MySQL query failed" . mysqli_error($this->conn));
        }
    }
    
    // Sanitise inputs
    function sanitise($value) {
        $value = trim($value);
        $value = stripslashes($value);
        $value = htmlspecialchars($value);
        return $value;
    }

    // check user password is correct
    function auth() {
        $sql = "SELECT id, email, password, token, is_active
                FROM users
                WHERE email = '{$this->email}'";
        
        // expect only one row
        $result = $this->conn->query($sql);
        if ($row = $result->fetch_assoc()) {
            // this will hash and check the password
            if(password_verify($this->password, $row["password"])) {
                $this->auth = true;
            }
        }
    }

    function is_logged_in() {
        return $this->auth;
    }
}
