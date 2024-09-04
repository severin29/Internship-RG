<?php
 header('Content-type: application/json');
 echo json_encode([
         'status' => 'success',
         'message' => 'Hello!',
 ]);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<form style="text-align: center;" action="POST">
    <input type="text" placeholder="Username"><br>
    <input type="password" placeholder="password"><br>
    <input type="submit">
</form>
</body>
</html>
