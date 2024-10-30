<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Utama User</title>
<!--    <link href="./Views/output.css" rel="stylesheet">-->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Your main content goes here -->
            <div class="container mx-auto">
                <!-- Button to Insert New Role -->
                <div class="mb-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <a href="index.php?modul=user&fitur=input">
                            <div class="flex items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.94 18.339L7.51 20.8869C7.26537 21.0782 6.9732 21.1993 6.66487 21.2372C6.35654 21.2751 6.0437 21.2284 5.75995 21.102C5.4762 20.9757 5.23225 20.7745 5.05432 20.5201C4.87638 20.2656 4.77118 19.9676 4.75 19.6579V6.34928C4.78647 5.35977 5.21452 4.42518 5.94014 3.75077C6.66575 3.07636 7.6296 2.71726 8.62 2.75235H15.38C16.3704 2.71726 17.3342 3.07636 18.0599 3.75077C18.7855 4.42518 19.2135 5.35977 19.25 6.34928V19.6579C19.2288 19.9676 19.1236 20.2656 18.9457 20.5201C18.7677 20.7745 18.5238 20.9757 18.24 21.102C17.9563 21.2284 17.6435 21.2751 17.3351 21.2372C17.0268 21.1993 16.7346 21.0782 16.49 20.8869L13.06 18.339C12.7521 18.1149 12.381 17.9941 12 17.9941C11.619 17.9941 11.2479 18.1149 10.94 18.339Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M11.9933 7V13" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                    <path d="M9 10.0065H15" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"/>
                                </svg>
            
                                <span class="ml-2">Insert New</span>
                            </div>
                        </a>
                    </button>
                </div>

                <!-- Roles Table -->
                <div class="bg-white shadow-md rounded my-6">
                    <table class="min-w-full bg-white grid-cols-1">
                        <thead class="bg-gray-800 text-white">

                        <tr>
                            <th class="w-1/12 py-3 px-4 font-semibold text-sm">User ID</th>
                            <th class="w-1/4 py-3 px-4 font-semibold text-sm">Username</th>
                            <th class="w-1/3 py-3 px-4 font-semibold text-sm">Role Name</th>
                            <th class="w-1/6 py-3 px-4 font-semibold text-sm">Role Description</th>
                            <th class="w-1/6 py-3 px-4 font-semibold text-sm">Status</th>
                            <th class="w-1/6 py-3 px-4 font-semibold text-sm">Gaji</th>
                            <th class="w-1/6 py-3 px-4 font-semibold text-sm">Actions</th>
                        </tr>

                        </thead>
                        <tbody class="text-gray-700">
                <?php if (!empty($users)) {
                    foreach ($users as $user) { ?>
                    <tr class="text-center">
                        <td class="py-3 px-4 text-blue-600">
                            <?php echo htmlspecialchars($user->userId); ?>
                        </td>
                        <td class="w-1/4 py-3 px-4">
                            <?php echo htmlspecialchars($user->username); ?>
                        </td>
                        <td class="w-1/3 py-3 px-4">
                            <?php echo htmlspecialchars($user->allDataRole->nama_peran); ?>
                        </td>
                        <td class="w-1/3 py-3 px-4">
                            <?php echo htmlspecialchars($user->allDataRole->desc_peran); ?>
                        </td>
                        <td class="w-1/6 py-3 px-4">
                            <?php echo htmlspecialchars($user->allDataRole->status_peran ? "Active" : "Inactive"); ?>
                        </td>
                        <td class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">
                            <?php echo htmlspecialchars($user->allDataRole->gaji); ?>
                        </td>
                        <td class="w-1/6 py-3 px-4">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="MainEntryPoint.php?modul=role&fitur=edit&id=<?php echo htmlspecialchars($user->userId); ?>">
                                    Update
                                </a>
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                                <a href="MainEntryPoint.php?modul=role&fitur=delete&id=<?php echo htmlspecialchars($user->userId); ?>">
                                    Delete
                                </a>
                            </button>
                        </td>
                    </tr>
                <?php
                    }
                } ?>
                </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
