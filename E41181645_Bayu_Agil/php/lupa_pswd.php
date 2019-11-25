<?php
    require  'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="lupa_pswd.php" method="post">
        <input type="text" name="email" placeholder="Masukkan email anda" autocomplete="off">
        <br>
        <button type="submit" name="reset">reset email</button>
    </form> 
</body>
</html>