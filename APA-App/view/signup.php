<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APA</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/homestyle.css">
</head>

<body>
    <!-- Signup Form -->
    <div class="form-container">
        <h2>Signup</h2>
        <form id="signupForm" action="../actions/signup_user.php" method="POST" novalidate>
            <div class="mb-3">
                <label for="signupName" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="signupName" placeholder="Enter your username">
                <small id="usernameError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="signupEmail" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="signupEmail" placeholder="Enter your email">
                <small id="emailError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="signupPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="signupPassword" placeholder="Create a password">
                <small id="passwordError" class="text-danger"></small>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm password">
                <small id="confirmPasswordError" class="text-danger"></small>
            </div>
            <button type="submit" class="btn btn-primary w-100">Signup</button>
        </form>
        <br>
        <div style="display: flex; flex-direction: row; justify-content: center;">
            <a>Already have an account?</a>
            <a href="login.php">Login</a>
        </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/form_validations.js"></script>
</body>

</html>
