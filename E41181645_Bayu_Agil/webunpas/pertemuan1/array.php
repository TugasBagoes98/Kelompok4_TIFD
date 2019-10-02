<!-- array 1 dimensi -->
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Array</title>
    <link rel="stylesheet" href="array.css">
</head>
<body>
    <?php
        $no = [10,20,30,40,50,60,70,80,90,100]
    ?>
    <?php foreach($no as $x) : ?>
        <div class="kotak"><?php echo $x; ?></div>
    <?php endforeach;?>
</body>
</html> -->

<!-- array multidimensi -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Array</title>
    <link rel="stylesheet" href="array.css">
</head>
<body>
    <?php
        $no = [
                [10,20,30],
                [40,50,60],
                [70,80,90],
                [100]];
    ?>
    <?php foreach($no as $x) : ?>
        <?php foreach($x as $y) : ?>
            <div class="kotak"><?= $y;?></div>
        <?php endforeach; ?>
            <div class="clear"></div>
    <?php endforeach; ?>   
</body>
</html>
