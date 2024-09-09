<?php
include 'db.php';
session_start();
$_SESSION['username'];
if (!isset($_SESSION['username'])) {
    header('Location: loginPage.php');
    exit();
}

if(isset($_POST['submit'])) {
    print_r($_POST);

    $team1ID = $_POST['team1'];
    $team2ID = $_POST['team2'];
    $team1Goals = $_POST['team1goals'];
    $team2Goals = $_POST['team2goals'];
    $date = $_POST['matchDate'];

    $query = "INSERT INTO matches (id, team1ID, team2ID, team1goals, team2goals, matchDate) 
              VALUES (NULL, '$team1ID', '$team2ID', '$team1Goals', '$team2Goals', '$date')";
    $resultInsert = mysqli_query($conn, $query);
    if ($resultInsert) {
        header('Location: matches.php?msg=Match Created');
    }else{
        echo "Failed creating player" . mysqli_error($conn);
    }

}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Add New Match</title>
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
<?php
$searchQuery = 'SELECT * FROM teams';
$result = mysqli_query($conn, $searchQuery);

$searchQuery2 = 'SELECT * FROM teams';
$result2 = mysqli_query($conn, $searchQuery);



?>
<form method="post" class="flex-col flex">
    <label for="team1">Team 1</label>
    <select name="team1" id="team1">
        <?php while ($rows = mysqli_fetch_assoc($result)) {
            echo "<option value=" . $rows['id'] . ">" . $rows['teamName'] . "</option>";
        }?>
    </select>
    <label for="team2">Team 2</label>
    <select name="team2" id="team2">
        <?php while ($rows = mysqli_fetch_assoc($result2)) {
            echo "<option value=" . $rows['id'] . ">" . $rows['teamName'] . "</option>";
        }?>
    </select>
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Team 1 goals
    </label>
    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-age" type="number" name="team1goals" placeholder="Enter goals for Team 1">
    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
        Team 2 goals
    </label>
    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-age" type="number" name="team2goals" placeholder="Enter goals for Team 2">
    <input type="date" name="matchDate">
    <button class="bg-black text-white p-5 rounded-md" type="submit" name="submit">Create Match</button>
</form>
</body>
</html>

