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
    <!-- Login Form -->
    <div class="form-container">
        <h2>Login</h2>
        <form id="loginForm" action="../actions/login_user.php" method="POST" novalidate>
            <div class="mb-3">
                <label for="loginEmail" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="loginEmail" placeholder="Enter your email">
                <small class="text-danger" id="emailError"></small>
            </div>
            <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password"name="password" class="form-control" id="loginPassword" placeholder="Enter your password">
                <small class="text-danger" id="passwordError"></small>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
        <div style="display: flex; flex-direction: row; justify-content: center;">
            <a>Don't have an account? </a>
            <a href="signup.php">Sign Up</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../assets/js/form_validations.js"></script>
</body>

</html>
