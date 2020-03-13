<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="welcome.php">License Manager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="reset-password.php" tabindex="-1" aria-disabled="true">Reset Password</a>
            </li>
            <li class="nav-item">

            </li>
            <a class="nav-link" href="logout.php" tabindex="-1" aria-disabled="true">Logout</a>
            </li>
            <li>
                <a class="nav-link disabled">Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
            </li>
        </ul>
    </div>
</nav>