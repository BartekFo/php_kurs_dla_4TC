<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <?php
    $path = $_SERVER['PHP_SELF'];
    $host = $_SERVER['HTTP_HOST'];


    $newPath = explode('/', $path);

    $newPath[count($newPath) - 1] = 'img';

    $newPath = implode('/', $newPath);

    $katalog = scandir('img');


    echo "<div class='container'>";
    foreach ($katalog as $key => $value) {
        if ($value === "." || $value === ".." || is_dir("img/" . $value)) continue;
        echo "<img class='img' src=\"http://$host$newPath/$value\">" . "<br>";
    }
    echo "</div>";
    ?>
    <form action="pobierz.php" method="post" enctype="multipart/form-data">
        <input type="text" name="name">
        <input type="file" name="file">
        <button type="submit" name="submit">Prześlij</button>
    </form>
</body>

</html>