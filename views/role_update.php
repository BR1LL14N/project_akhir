<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Role</title>
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
            <!-- Formulir Input Role -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update Role</h2>
                <form action="index.php?modul=role&fitur=update" method="POST">
                    <input type="hidden" name="id_peran" value="<?php echo $role->id_peran ?>">
                    <!-- Nama Role -->
                    <div class="mb-4">
                        <label for="nama_peran" class="block text-gray-700 text-sm font-bold mb-2">Nama Role:</label>
                        <input id="nama_peran" name="nama_peran" value="<?php echo $role->nama_peran ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  required>
                    </div>

                    <!-- Role Deskripsi -->
                    <div class="mb-4">
                        <label for="desc_peran" class="block text-gray-700 text-sm font-bold mb-2">Role Deskripsi:</label>
                        <textarea id="desc_peran" name="desc_peran" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="3" required><?php echo $role->desc_peran ?></textarea>
                    </div>

                    <!-- Role Status -->
                    <div class="mb-4">
                        <label for="status_peran" class="block text-gray-700 text-sm font-bold mb-2">Role Status:</label>
                        <select id="status_peran" name="status_peran" value="<?php echo $role->status_peran ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                            <option value="">Pilih Status</option>
                            <option value="1" <?= $role->status_peran == 1 ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= $role->status_peran == 0 ? 'selected' : '' ?>>Inactive</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="gaji" class="block text-gray-700 text-sm font-bold mb-2">GAJI:</label>
                        <input id="gaji" name="gaji" value="<?php echo $role->gaji ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  required>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
