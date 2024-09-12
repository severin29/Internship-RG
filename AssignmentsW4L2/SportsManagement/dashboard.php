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
        <a href="dashboard.php" class="font-semibold text-2xl tracking-tight">RG Sports</a>    </div>
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
<div class="mx-auto">
    <div class="relative flex flex-col w-full h-full overflow-scroll text-slate-300 bg-slate-800 shadow-md rounded-lg bg-clip-border">
        <table class="w-full text-left table-auto min-w-max mx-10 my-10">
            <thead>
            <tr>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Players per team
                    </p>
                </th>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Value
                    </p>
                </th>
            </thead>
            <tbody>
                <?php

                $teamsQuery = "SELECT * FROM teams";
                $teamsResult = mysqli_query($conn, $teamsQuery);

                while ($teamRow = mysqli_fetch_assoc($teamsResult)) {
                    $playersQuery = "SELECT COUNT(id) FROM players WHERE team_id = $teamRow[id]";
                    $playersResult = mysqli_query($conn, $playersQuery);
                    $playerRow = mysqli_fetch_assoc($playersResult);
                    echo "<tr class='hover:bg-slate-700'>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . $teamRow['teamName'] . "</td>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . $playerRow['COUNT(id)'] . "</td>
                              </tr>";
                }

                ?>
            </tbody>
        </table>
        <hr>
        <table class="w-full text-left table-auto min-w-max mx-10 my-10">
            <thead>
            <tr>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Average age of players per team
                    </p>
                </th>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Value
                    </p>
                </th>
            </thead>
            <tbody>
            <?php

            $teamsQuery = "SELECT * FROM teams";
            $teamsResult = mysqli_query($conn, $teamsQuery);

            while ($teamRow = mysqli_fetch_assoc($teamsResult)) {
                $playersQuery = "SELECT AVG(age) FROM players WHERE team_id = $teamRow[id]";
                $playersResult = mysqli_query($conn, $playersQuery);
                $playerRow = mysqli_fetch_assoc($playersResult);
                echo "<tr class='hover:bg-slate-700'>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . $teamRow['teamName'] . "</td>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . (int) $playerRow['AVG(age)'] . "</td>
                              </tr>";
            }

            ?>
            </tbody>
        </table>
        <hr>
        <table class="w-full text-left table-auto min-w-max mx-10 my-10">
            <thead>
            <tr>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Matches Played by Team
                    </p>
                </th>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Value
                    </p>
                </th>
            </thead>
            <tbody>
            <?php
            $matchesQuery = "SELECT t.ID,
                                        t.teamName,
                                        COUNT(m.ID) AS matchesPlayed
                                    FROM
                                        teams t
                                            LEFT JOIN
                                        matches m ON t.ID = m.team1ID OR t.ID = m.team2ID
                                    GROUP BY
                                        t.ID, t.teamName
                                    ORDER BY
                                        matchesPlayed DESC";
            $matchesResult = mysqli_query($conn, $matchesQuery);
            while ($matchesRow = mysqli_fetch_assoc($matchesResult)) {
                echo "<tr class='hover:bg-slate-700'>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . $matchesRow['teamName'] . "</td>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . $matchesRow['matchesPlayed'] . "</td>
                              </tr>";

            }

            ?>
            </tbody>
        </table>
        <hr>
        <table class="w-full text-left table-auto min-w-max mx-10 my-10">
            <thead>
            <tr>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Average goals per team in a single match
                    </p>
                </th>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Value
                    </p>
                </th>
            </thead>
            <tbody>
            <?php

            $goalsQuery = "SELECT t.teamName,
                                AVG(CASE
                                        WHEN m.team1ID = t.ID THEN m.team1goals
                                        ELSE m.team2goals
                                    END) AS average_goals
                            FROM
                                matches m
                                    JOIN
                                teams t ON t.ID IN (m.team1ID, m.team2ID)
                            GROUP BY
                                t.teamName";
            $goalsResult = mysqli_query($conn, $goalsQuery);
            while ($goalsRow = mysqli_fetch_assoc($goalsResult)) {
                echo "<tr class='hover:bg-slate-700'>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . $goalsRow['teamName'] . "</td>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . $goalsRow['average_goals'] . "</td>
                              </tr>";
            }
            ?>

            </tbody>
        </table>
        <hr>
        <table class="w-full text-left table-auto min-w-max mx-10 my-10">
            <thead>
            <tr>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Ranking by Match Wins
                    </p>
                </th>
                <th class="p-4 border-b border-slate-600 bg-slate-700">
                    <p class="text-2xl font-normal leading-none text-slate-300">
                        Value
                    </p>
                </th>
            </thead>
            <tbody>
            <?php

            $winsQuery = "SELECT t.teamName,
                                COUNT(CASE
                                          WHEN m.team1ID = t.ID AND m.team1Goals > m.team2Goals THEN 1
                                          WHEN m.team2ID = t.ID AND m.team2Goals > m.team1Goals THEN 1
                                    END) AS matchWins
                            FROM
                                teams t
                                    LEFT JOIN
                                matches m ON t.ID = m.team1ID OR t.ID = m.team2ID
                            GROUP BY
                                t.teamName
                            ORDER BY matchWins DESC";

            $winsResult = mysqli_query($conn, $winsQuery);
            while ($winsRow = mysqli_fetch_assoc($winsResult)) {
                echo "<tr class='hover:bg-slate-700'>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . $winsRow['teamName'] . "</td>
                                 <td class='p-4 border-b border-slate-700 text-lg'>" . $winsRow['matchWins'] . "</td>
                              </tr>";
            }
            ?>

            </tbody>
        </table>
    </div>
</div>
</body>
</html>
