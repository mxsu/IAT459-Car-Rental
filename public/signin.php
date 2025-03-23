<?php
// Database connection
require('../includes/connect-db.php');

$conn = mysqli_connect($servername, $username, $password, $db);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        // Signup logic
        $email = $_POST['email'];
        //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $stmt = $conn->prepare("INSERT INTO members (Email, Password) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $password);

        if ($stmt->execute()) {
            $message = "Signup successful! You can now log in.";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['login'])) {
        // Login logic
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT * FROM members WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && $password = $user['Password']) {
            $message = "Login successful! Welcome, " . htmlspecialchars($email);
            header("Location: profile.php");
            exit();
        } else {
            $message = "Invalid email or password.";
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup/Login</title>
</head>

<body>
    <h1>Signup/Login</h1>
    <p><?php echo htmlspecialchars($message); ?></p>

    <h2>Signup</h2>
    <form method="POST">
        <label for="signup-email">Email:</label>
        <input type="email" id="signup-email" name="email" required>
        <br>
        <label for="signup-password">Password:</label>
        <input type="password" id="signup-password" name="password" required>
        <br>
        <button type="submit" name="signup">Signup</button>
    </form>

    <h2>Login</h2>
    <form method="POST">
        <label for="login-email">Email:</label>
        <input type="email" id="login-email" name="email" required>
        <br>
        <label for="login-password">Password:</label>
        <input type="password" id="login-password" name="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>
</body>

</html>