<?php 
session_start();
require_once './model/user_model.php';
// require_once '../domain-object/node-user.php'; 

$userModel = new User_model();

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $error = false;
    $error_user = false;

    $user = $userModel->getUserByUsername($username);
    
    if ($user && $password == $user->password) {
        if($user->id_role == 2){
            $error_user = true;
        }else{
            $_SESSION["login"] = true;
            $_SESSION["username"] = $user->username;
            $_SESSION["role_id"] = $user->allDataRole->id_peran; 
            header("Location: ./index.php?modul=dashboard");
            exit;
        }
        
    } else {
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page - Desktop View</title>
    <!-- CDN Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Warna dan shadow kustom */
        .bg-primary { background-color: #4a90e2; }
        .bg-primary-accent-300 { background-color: #4a90e2cc; }
        .shadow-primary-3 { box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        .text-danger { color: #e3342f; }
        .text-danger-600:hover { color: #c53030; }
    </style>
</head>
<body>
<section class="h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-8 lg:flex lg:items-center lg:justify-between lg:px-12 lg:py-8">
        
        <!-- Left Side: Image Section -->
        <div class="hidden lg:block lg:w-1/2 pr-8">
            <img src="https://tecdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="w-full h-auto rounded-lg" alt="Sample image">
        </div>

        <!-- Error Alerts -->
        <?php if (isset($error_user) && $error_user): ?>
            <p class="text-danger text-center italic mb-4">User Tidak Bisa Login!</p>
        <?php endif; ?>
        <?php if (isset($error) && $error): ?>
            <p class="text-danger text-center italic mb-4">Username atau Password salah!</p>
        <?php endif; ?>

        <!-- Right Side: Form Section -->
        <div class="lg:w-1/2">
            <form method="post" action="login.php">
                <!-- Social Media Buttons -->
                <div class="flex justify-center space-x-4 mb-6">
                    <!-- Facebook Button -->
                    <button type="button" class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="w-4 h-4 fill-current">
                            <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                        </svg>
                    </button>
                    <!-- Twitter Button -->
                    <button type="button" class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="w-4 h-4 fill-current">
                            <path d="M448 64H64C28.65 64 0 92.65 0 128V384C0 419.3 28.65 448 64 448H448c35.35 0 64-28.65 64-64V128C512 92.65 483.3 64 448 64zM232 352C192.3 352 160 319.7 160 280C160 240.3 192.3 208 232 208s72 32.3 72 72C304 319.7 272.7 352 232 352z"/>
                        </svg>
                    </button>
                    <!-- LinkedIn Button -->
                    <button type="button" class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-4 h-4 fill-current">
                            <path d="M100.3 448H7.4V148.9h92.9zM53.8 108.1C24.1 108.1 0 83.5 0 53.8a53.8 53.8 0 1 1 107.6 0c0 29.7-24.1 54.3-53.8 54.3zM447.9 448h-92.7V302.4c0-34.7-.7-79.2-48.3-79.2-48.3 0-55.7 37.7-55.7 76.7V448h-92.8V148.9h89.1v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.3 61.9 111.3 142.3V448z"/>
                        </svg>
                    </button>
                </div>

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 text-sm font-semibold">Username</label>
                    <input type="text" id="username" name="username" class="block w-full mt-2 p-2 border border-gray-300 rounded-md focus:border-primary focus:outline-none" placeholder="Enter Username">
                </div>

                <!-- Password Input -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="block w-full mt-2 p-2 border border-gray-300 rounded-md focus:border-primary focus:outline-none" placeholder="Enter password">
                </div>

                <!-- Remember Me Checkbox and Forgot Password Link -->
                <div class="flex items-center justify-between mb-6">
                    <label class="inline-flex items-center">
                        <input type="checkbox" class="form-checkbox text-primary">
                        <span class="ml-2 text-gray-600 text-sm">Remember me</span>
                    </label>
                    <a href="#" class="text-primary text-sm hover:text-primary-accent-300">Forgot password?</a>
                </div>

                <!-- Login Button -->
                <button type="submit" class="w-full py-2 bg-primary text-white rounded-md shadow-md hover:bg-primary-accent-300" name="submit">Login</button>

                <!-- Register Link -->
                <p class="mt-4 text-center text-sm">Don't have an account?
                    <a href="#" class="text-danger hover:text-danger-600">Register</a>
                </p>
            </form>
        </div>
    </div>
</section>
</body>
</html>
