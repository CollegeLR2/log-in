<!-- page accessed through clicking email link -->
<?php 
include "db.php";
$conn = connect();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class='container text-center'>
        <h1>Verify Email</h1>
        <br />

        <?php 
        if(isset($_GET["token"])) {
            $token = $_GET["token"];
            // echo $token;
            // $query = "SELECT * FROM users WHERE token = '$token'";
            // $stmt = $conn->prepare($query);
            // $result = $stmt->execute();
            $query = "UPDATE users SET is_active = 1 WHERE token = '$token'";
            $stmt = $conn->prepare($query);
            $stmt->execute();
            echo "<h4 class='success'>You have been successfully verified. <br /> Please log in again to continue:</h4>";
            include "log-in.php";
        } else {
            echo "<h4 class='failure'>Unable to verify your email, please try again</h4>";
            echo "<button><a href='index.php' class='link-button'>Go back</a></button>";
        } 
        ?>
    </div>

</body>
</html>
