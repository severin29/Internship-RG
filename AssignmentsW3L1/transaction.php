<?php

include './sidenav.php';
include './header.php';
include './footer.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.cdnfonts.com/css/helvetica-neue-55" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="script.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
          rel="stylesheet">
    <title>Document</title>
</head>
<body>
<?php spawnHeader(); ?>
<main>
    <?php sidenav(); ?>
    <div class="body">
        <div id="overview" class="overview">
            <span class="heading">Transaction History</span>
            <div class="buttons">
                <button>Deposit</button>
                <button>Withdraw</button>
                <button>Transfer</button>
            </div>

        </div>
        <div class="search">
            <div>
                <p>Select Coin</p>
                <select name="coins" id="coins">
                    <option value="">BTC</option>
                    <option value="">ETH</option>
                </select>
            </div>
            <div>
                <p>Payment Type</p>
                <input type="text" placeholder="All Type">
            </div>
            <div>
                <p>Creation Date</p>
                <input type="text" placeholder="From Date">
            </div>
            <div>
                <p>Creation Date</p>
                <input type="text" placeholder="To Date">
            </div>
            <div>
                <p>Status</p>
                <input type="text" placeholder="All">
            </div>
            <div>
                <button>Search</button>
            </div>
        </div>
        <div class="history">
            <span>History results</span>
        </div>
        <div class="table-container">
            <table>
                <thead>
                <tr>
                    <th>Type</th>
                    <th>From coin</th>
                    <th>To coin</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Deposit</td>
                    <td>12.000000 BTC</td>
                    <td>12.000000</td>
                    <td>2022-02-28 13:09:00</td>
                    <td class="approved">Approved</td>
                </tr>
                <tr>
                    <td>Exchange</td>
                    <td>1.000000 BTC</td>
                    <td>1.000000 ADA</td>
                    <td>2022-02-28 13:09:21</td>
                    <td class="approved">Approved</td>
                </tr>
                <tr>
                    <td>Deposit</td>
                    <td>1.000000 BTC</td>
                    <td>1.000000</td>
                    <td>2022-02-28 14:53:02</td>
                    <td class="waiting">Waiting</td>
                </tr>
                <tr>
                    <td>Deposit</td>
                    <td>12.000000 BTC</td>
                    <td>12.000000</td>
                    <td>2022-02-28 13:09:00</td>
                    <td class="approved">Approved</td>
                </tr>
                <tr>
                    <td>Exchange</td>
                    <td>1.000000 BTC</td>
                    <td>1.000000 ADA</td>
                    <td>2022-02-28 13:09:21</td>
                    <td class="approved">Approved</td>
                </tr>
                <tr>
                    <td>Deposit</td>
                    <td>1.000000 BTC</td>
                    <td>1.000000</td>
                    <td>2022-02-28 14:53:02</td>
                    <td class="waiting">Waiting</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</main>
<div class="free-space"></div>
<?php footer(); ?>
</body>
</html>

