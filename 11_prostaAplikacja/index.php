<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>
            <a href="index.php">Home</a>
        </li>
        <li><a href="index.php?i=1">About</a></li>
        <li><a href="index.php?i=2">Contact</a></li>
    </ul>

    <?php
        if(isset($_GET['i'])){
            if($_GET['i'] === '1'){
                echo '<h1>About</h1>';
            } else if($_GET['i'] === '2'){
                echo '<h1>Contact</h1>';
            }
        } else {
                echo '<h1>Strona Główna</h1>';
        }
    ?>
</body>
</html>