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
            <span class="heading">Internal Transfer</span>
            <div class="buttons">
                <button>Deposit</button>
                <button>Withdraw</button>
                <button>Transfer</button>
            </div>
        </div>
        <div class="transfer">
            <div class="headings">
                <p>Deposit to trading account</p>
                <p class="p-withdraw">Withdrawal from trading account</p>
            </div>
            <div class="cards">
                <div class="card">
                    <p>Available USDT: 20003.31 USDT</p>
                    <input type="number">
                    <button>Deposit</button>
                </div>
                <div class="card">
                    <p>Available USDT: 20003.31 USDT</p>
                    <input type="number">
                    <button>Withdraw</button>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="free-space"></div>
<?php footer(); ?>
</body>
</html>
