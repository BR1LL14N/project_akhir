<?php
// Pastikan session sudah dimulai
// session_start();

// Pastikan model User dan Role sudah diimport
require_once  './model/user_model.php';
require_once './model/role_model.php';

// Cek apakah user sudah login
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$roleName = '';

// Ambil role berdasarkan role_id dari session
if (isset($_SESSION['role_id'])) {
    $roleModel = new Role_model();
    $role = $roleModel->getRoleById($_SESSION['role_id']);
    if ($role) {
        $roleName = $role->nama_peran;
    }
}
?>

<nav class="bg-blue-600 p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            My Application
        </div>
        <div class="text-white">
            <span class="mr-4"><?= htmlspecialchars($username); ?></span>
            <span class="mr-4"><?= htmlspecialchars($roleName); ?></span>
            
            <!-- Tombol Logout dengan ikon dan teks sesuai style pada file yang ingin dikonfigurasikan -->
            <button class="bg-red-500 hover:bg-red-700 text-white font-sans py-1 px-3 rounded">
                <a href="logout.php">
                    <div class="flex items-center">
                        <!-- SVG Ikon Logout -->
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.4767 21.2448H8.34067C7.04877 21.3045 5.78536 20.8527 4.82407 19.9876C3.86278 19.1224 3.28099 17.9134 3.2047 16.6224V7.37762C3.28099 6.08659 3.86278 4.87757 4.82407 4.01241C5.78536 3.14724 7.04877 2.69559 8.34067 2.75524H13.4767" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M20.7953 12H7.44174" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                            <path d="M16.0833 17.136L20.4874 12.7319C20.6802 12.5371 20.7884 12.2742 20.7884 12C20.7884 11.7259 20.6802 11.4629 20.4874 11.2681L16.0833 6.86404" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="ml-2">Logout</span>
                    </div>
                </a>
            </button>
        </div>
    </div>
</nav>


