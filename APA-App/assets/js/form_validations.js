/**
 * Form validation for signup form
 */
document.getElementById('signupForm').addEventListener('submit', function(event) {
    let isValid = true; 

    // Clear all errors
    document.querySelectorAll('small.text-danger').forEach(error => error.textContent = '');

    // Username validation
    const username = document.getElementById('signupName').value.trim();
    const usernameError = document.getElementById('usernameError');
    if (!username) {
        usernameError.textContent = 'Username is required.';
        isValid = false;
    } else if (/^\d/.test(username)) {
        usernameError.textContent = 'Username cannot start with a number.';
        isValid = false;
    }

    // Email validation
    const email = document.getElementById('signupEmail').value.trim();
    const emailError = document.getElementById('emailError');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!email) {
        emailError.textContent = 'Email is required.';
        isValid = false;
    } else if (!emailRegex.test(email)) {
        emailError.textContent = 'Enter a valid email address.';
        isValid = false;
    }

    // Password validation
    const password = document.getElementById('signupPassword').value;
    const passwordError = document.getElementById('passwordError');
    const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=(?:.*\d){3})(?=.*[@#$%^&+=!.,]).{8,}$/;
    if (!password) {
        passwordError.textContent = 'Password is required.';
        isValid = false;
    } else if (!passwordRegex.test(password)) {
        passwordError.textContent = 'Password must be at least 8 characters long, include one uppercase letter, one number, and one special character.';
        isValid = false;
    }

    // Confirm Password validation
    const confirmPassword = document.getElementById('confirmPassword').value;
    const confirmPasswordError = document.getElementById('confirmPasswordError');
    if (!confirmPassword) {
        confirmPasswordError.textContent = 'Please confirm your password.';
        isValid = false;
    } else if (confirmPassword !== password) {
        confirmPasswordError.textContent = 'Passwords do not match.';
        isValid = false;
    }

    // Prevent form submission if any field is invalid
    if (!isValid) {
        event.preventDefault(); 
    }
});

/**
 * Login form validation
 */
document.getElementById("loginForm").addEventListener("submit", function (event) {
    // Prevent form submission
    event.preventDefault();

    // Clear previous error messages
    document.getElementById("emailError").textContent = "";
    document.getElementById("passwordError").textContent = "";

    // Get input values
    const email = document.getElementById("loginEmail").value.trim();
    const password = document.getElementById("loginPassword").value.trim();

    let isValid = true;

    // Email validation
    if (email === "") {
        document.getElementById("emailError").textContent = "Email is required.";
        isValid = false;
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById("emailError").textContent = "Please enter a valid email address.";
        isValid = false;
    }

    // Password validation
    if (password === "") {
        document.getElementById("passwordError").textContent = "Password is required.";
        isValid = false;
    }

    // Submit the form if all validations pass
    if (isValid) {
        this.submit(); 
    }
});