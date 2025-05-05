<?php
session_start();
$redirect_url = "http://localhost/d2d/index.php"; // Update if needed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'conn.php';

    if (isset($_POST['_form_type'])) {
        // SIGN-UP
        if ($_POST['_form_type'] === 'signup') {
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $password = mysqli_real_escape_string($conn, $_POST['password']); // stored in plain text

            if (!empty($name) && !empty($email) && !empty($phone) && !empty($password)) {
                $check_email = "SELECT * FROM register WHERE email = '$email'";
                $result = mysqli_query($conn, $check_email);

                if (mysqli_num_rows($result) > 0) {
                    echo "<script>alert('Email already registered'); window.history.back();</script>";
                    exit();
                }

                $sql = "INSERT INTO register (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
                if (mysqli_query($conn, $sql)) {
                    echo "<script>alert('Registration successful! Please login.'); window.location.href='register.php';</script>";
                    exit();
                } else {
                    echo "<script>alert('Database error during registration'); window.history.back();</script>";
                    exit();
                }
            } else {
                echo "<script>alert('All fields are required'); window.history.back();</script>";
                exit();
            }
        }

        // LOGIN
        if ($_POST['_form_type'] === 'login') {
            $email = mysqli_real_escape_string($conn, $_POST['login-email']);
            $password = mysqli_real_escape_string($conn, $_POST['login-password']);

            if (!empty($email) && !empty($password)) {
                $sql = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) == 1) {
                    $_SESSION['loggedInUser'] = mysqli_fetch_assoc($result);
                    header("Location: $redirect_url");
                    exit();
                } else {
                    echo "<script>alert('Invalid email or password'); window.history.back();</script>";
                    exit();
                }
            } else {
                echo "<script>alert('Please enter both email and password'); window.history.back();</script>";
                exit();
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EcoCollect - Login / Sign Up</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    .tab-content { display: none; }
    .tab-content.active { display: block; animation: fadeIn 0.4s ease-in-out; }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .tab-btn.active {
      color: #22c55e;
      border-bottom: 2px solid #22c55e;
      font-weight: 500;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

  <div class="bg-white shadow-xl rounded-lg max-w-md w-full p-6 md:p-8 relative">

    <!-- Logo -->
    <div class="flex justify-center mb-6">
      <i class="fas fa-recycle text-green-500 text-3xl"></i>
      <span class="font-bold text-xl ml-2 text-gray-800">EcoCollect</span>
    </div>

    <!-- Tabs -->
    <div class="flex justify-around border-b mb-6">
      <button id="login-tab" class="w-1/2 py-2 text-center text-gray-500 tab-btn active">Login</button>
      <button id="signup-tab" class="w-1/2 py-2 text-center text-gray-500 tab-btn">Sign Up</button>
    </div>

    <!-- Login Form -->
    <form id="login-form" method="POST" class="tab-content active space-y-4">
      <input type="hidden" name="_form_type" value="login">
      <h3 class="text-xl font-semibold text-center text-gray-700">Login to Your Account</h3>

      <div>
        <label for="login-email" class="block text-sm text-gray-700 mb-1">Email Address</label>
        <input type="email" id="login-email" name="login-email" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
               placeholder="you@example.com">
      </div>

      <div>
        <label for="login-password" class="block text-sm text-gray-700 mb-1">Password</label>
        <input type="password" id="login-password" name="login-password" required minlength="6"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
               placeholder="••••••••">
      </div>

      <input type="submit" value="Sign In"
      class="w-full px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition duration-300 cursor-pointer">
    </form>

    <!-- Sign Up Form -->
    <form id="signup-form" method="POST" class="tab-content space-y-4">
      <input type="hidden" name="_form_type" value="signup">
      <h3 class="text-xl font-semibold text-center text-gray-700">Create New Account</h3>

      <div>
        <label for="signup-name" class="block text-sm text-gray-700 mb-1">Full Name</label>
        <input type="text" id="signup-name" name="name" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
               placeholder="John Doe">
      </div>

      <div>
        <label for="signup-email" class="block text-sm text-gray-700 mb-1">Email Address</label>
        <input type="email" id="signup-email" name="email" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
               placeholder="you@example.com">
      </div>

      <div>
        <label for="signup-phone" class="block text-sm text-gray-700 mb-1">Phone Number</label>
        <input type="tel" id="signup-phone" name="phone" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
               placeholder="9876543210">
      </div>

      <div>
        <label for="signup-password" class="block text-sm text-gray-700 mb-1">Password</label>
        <input type="password" id="signup-password" name="password" required minlength="6"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500"
               placeholder="••••••••">
      </div>

      <div class="flex items-center">
        <input id="terms" type="checkbox" required class="text-green-500">
        <label for="terms" class="ml-2 text-sm text-gray-600">
          I agree to the Terms of Service and Privacy Policy.
        </label>
      </div>

      <input type="submit" value="Register"
      class="w-full px-4 py-2 bg-green-500 text-white font-medium rounded-lg hover:bg-green-600 transition duration-300 cursor-pointer">
    </form>

    <!-- Footer -->
    <p class="mt-6 text-center text-sm text-gray-500">
      Already have an account?
      <button type="button" id="switch-to-login" class="text-green-500 hover:underline font-medium">Login</button>
      |
      <button type="button" id="switch-to-signup" class="text-green-500 hover:underline font-medium">Sign Up</button>
    </p>
  </div>

  <script>
    const loginTab = document.getElementById('login-tab');
    const signupTab = document.getElementById('signup-tab');
    const loginForm = document.getElementById('login-form');
    const signupForm = document.getElementById('signup-form');
    const switchToLogin = document.getElementById('switch-to-login');
    const switchToSignup = document.getElementById('switch-to-signup');

    function activateTab(tab) {
      loginTab.classList.remove('active');
      signupTab.classList.remove('active');
      loginForm.classList.remove('active');
      signupForm.classList.remove('active');

      if (tab === 'login') {
        loginTab.classList.add('active');
        loginForm.classList.add('active');
      } else {
        signupTab.classList.add('active');
        signupForm.classList.add('active');
      }
    }

    loginTab.addEventListener('click', () => activateTab('login'));
    signupTab.addEventListener('click', () => activateTab('signup'));
    switchToLogin.addEventListener('click', () => activateTab('login'));
    switchToSignup.addEventListener('click', () => activateTab('signup'));
  </script>
</body>
</html>
