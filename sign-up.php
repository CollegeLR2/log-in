<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container text-center">
        <h1>Sign Up</h1>
        <br />
        <form action="sign-up-action.php" method="post">
            <p>
                <input type="email" name="email" required placeholder="email">
            </p>
            <p>
                <input type="password" name="password" required placeholder="create a password">
            </p>
            <!-- the plan is to use this colour to style some parts of the page when the user logs in -->
            <p>
                Pick your favourite colour 
                <br />
                <input type="color" name="colour" value="#5a1983">
            </p>

            <button type="submit">Sign me up</button>
        </form>

        <br />
        <button><a href="index.php" class="link-button">Home</a></button>

    </div>
</body>
</html>
