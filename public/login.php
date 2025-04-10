<?php
//Tutorial used: https://www.youtube.com/watch?v=5L9UhOnuos0

$is_invalid = false;


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $mysqli = require("../includes/connect-db.php");

    $sql = sprintf(
        "SELECT * FROM user WHERE email = '%s'",
        $mysqli->real_escape_string($_POST["email"])
    );
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();

    if ($user) {

        if (password_verify($_POST["password"], $user["Password"])) {

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["user_id"];
            $_SESSION["email"] = $user["email"];
            header("Location: profile.php");
            exit;
        }
    }

    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <?php
    include("../includes/navbar.php");
    ?>
</head>

<body>
    <h1> Log in </h1>

    <?php if ($is_invalid) : ?>
        <em>Invalid login</em>
    <?php endif; ?>

    <form method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST["email"] ?? "") ?>">

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Log In</button>
    </form>

    <p>Don't have an account? <a href="signup.php">Sign up</a></p>
</body>

</html>