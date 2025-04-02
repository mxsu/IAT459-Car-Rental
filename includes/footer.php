<footer>
    <nav>
        <ul>
            <li><a href="/IAT459-Car-Rental/index.php">Home</a></li>
            <?php if ($isSignedIn): ?>
                <li><a href="/IAT459-Car-Rental/profile.php">Profile</a></li>
            <?php else: ?>
                <li><a href="/IAT459-Car-Rental/signin.php">Sign In</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    </ul>
    <p>&copy; <?php echo date("Y"); ?> IAT459 Project: Marine Drive Car Rental by Chan Owen, Su Michael</p>
</footer>