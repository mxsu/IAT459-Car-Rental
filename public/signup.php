<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <?php
    include("../includes/navbar.php");
    $form_data = $_SESSION["form_data"] ?? []; // Retrieve session data
    unset($_SESSION["form_data"]); // Remove session after using
    ?>
</head>

<body>
    </ul>
    <h1> Sign up </h1>

    <form action="process-signup.php" method="POST" novalidate>
        <div>
            <label for="first-name">First Name:</label>
            <input type="text" id="first-name" name="first-name" required value="<?php echo htmlspecialchars($form_data["first-name"] ?? "") ?>">

            <label for="last-name">Last Name:</label>
            <input type="text" id="last-name" name="last-name" required value="<?php echo htmlspecialchars($form_data["last-name"] ?? "") ?>">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($form_data["email"] ?? "") ?>">
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Repeat Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit">Sign Up</button>

    </form>
    <?php if (!empty($form_data) && (empty($form_data["first-name"]) || empty($form_data["last-name"]) || empty($form_data["email"]) || empty($form_data["password"]))): ?>
        <p><?php echo "Fields cannot be empty"; ?></p>
    <?php endif; ?>

    <?php if (!empty($form_data) && ($form_data["password"] !== $form_data["password_confirmation"])): ?>
        <p>Passwords do not match.</p>
    <?php endif; ?>
</body>

</html>