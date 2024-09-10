<?php
include 'db.php';
    session_start();
    $_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header('Location: loginPage.php');
    exit();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Dashboard</title>
</head>
<body>
<nav class="flex items-center justify-between flex-wrap bg-black p-6">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
        <span class="font-semibold text-2xl tracking-tight">RG Sports</span>
    </div>
    <div class="block lg:hidden">
        <button class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white">
            <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
        </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
        <div class="text-sm lg:flex-grow">
            <a href="players.php" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red-600 mr-4 text-lg">
                Players
            </a>
            <a href="teams.php" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red-600 mr-4 text-lg">
                Teams
            </a>
            <a href="matches.php" class="block mt-4 lg:inline-block lg:mt-0 text-white hover:text-red-600 mr-4 text-lg">
                Matches
            </a>
        </div>
        <div>
            <a href="logout.php" class="inline-block text-lg px-4 py-2 leading-none border rounded text-white border-white hover:border-red-600 hover:text-red-600 hover:bg-black mt-4 lg:mt-0">Logout</a>
        </div>
    </div>
</nav>

</body>
</html>
