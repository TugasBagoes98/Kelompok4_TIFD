<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1><?= $_GET["merk"]?></h1>
    <ul>
        <li><img src="Gambar/<?= $_GET["gambar"]; ?>" alt=""></li>
        <li><?= $_GET["ram/rom"]?></li>
        <li><?= $_GET["android"]?></li>
        <li><?= $_GET["warna"]?></li>
        
        <a href="get_post2.php">back</a>
    
    </ul>
</body>
</html>