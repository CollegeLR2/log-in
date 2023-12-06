<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container text-center">
        <h1>Log in</h1>
        <br />
        <form action="log-in-action.php" method="post">
            <p>
                <input type="email" name="email" required placeholder="email">
            </p>
            <p>
                <input type="password" name="password" required placeholder="password">
            </p>
            <button type="submit">Log in</button>
        </form>

        <?php if(isset($_GET["msg"]) && $_GET["msg"]=="incorrect"): ?>
            <br />
            <h4 class="failure">Invalid credentials</h4>
        <?php endif ?>

        <br />
        <button><a href="index.php" class="link-button">Home</a></button>

    </div>
</body>
</html>
