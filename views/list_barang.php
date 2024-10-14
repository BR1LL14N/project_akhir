<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Role</title>
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
                    <a href="views/input_barang.php?modul=role&fitur=add">Insert New barang</a>
                </button>
            </div>

            <!-- Roles Table -->
            <div class="bg-white shadow-md rounded my-6">
                <table class="min-w-full bg-white grid-cols-1">
                    <thead class="bg-gray-800 text-white">

                    <tr>
                        <th class="w-1/12 py-3 px-4 uppercase font-semibold text-sm">ID BARANG</th>
                        <th class="w-1/4 py-3 px-4 uppercase font-semibold text-sm">NAMA BARANG</th>
                        <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">HARGA BARANG</th>
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">STATUS BARANG</th>
                        <th class="w-1/3 py-3 px-4 uppercase font-semibold text-sm">JUMLAH BARANG</th>
                        
                        <th class="w-1/6 py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                    </tr>

                    </thead>
                    <tbody class="text-gray-700">
                    <!-- Static Data Rows -->
                    <?php foreach ($obj_barang as $barang){?>
                    <tr class="text-center">
                        <td class="py-3 px-4 text-blue-600"><?php echo htmlspecialchars($barang->id_barang) ?></td>
                        <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($barang->nama_barang) ?></td>
                        <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($barang->harga_barang) ?></td>
                        <td class="w-1/4 py-3 px-4"><?php echo htmlspecialchars($barang->status_barang)?"Active":"Inactive" ?></td>
                        <td class="w-1/6 py-3 px-4"><?php echo htmlspecialchars($barang->jumlah_barang) ?></td>
                        
                                
                        <td class="w-1/6 py-3 px-4">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="#">Update</a>
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="#">Delete</a>
                            </button>
                        </td>
                        <?php } ?>
                    </tr>

                    <!-- <tr class="text-center">
                        <td class="py-3 px-4 text-blue-600">2</td>
                        <td class="w-1/4 py-3 px-4">Editor</td>
                        <td class="w-1/3 py-3 px-4">Can edit content but limited access to settings</td>
                        <td class="w-1/6 py-3 px-4">Active</td>
                        <td class="w-1/6 py-3 px-4">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="#">Update</a>
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="#">Delete</a>
                            </button>
                        </td>
                    </tr> -->

                    <!-- <tr class="text-center">
                        <td class="py-3 px-4 text-blue-600">3</td>
                        <td class="w-1/4 py-3 px-4">Viewer</td>
                        <td class="w-1/3 py-3 px-4">Can only view content, no editing privileges</td>
                        <td class="w-1/6 py-3 px-4">Inactive</td>
                        <td class="w-1/6 py-3 px-4">
                            <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="#">Update</a>
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded mr-2">
                                <a href="#">Delete</a>
                            </button>
                        </td>
                    </tr> -->
                    <!-- More rows can be added statically here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
