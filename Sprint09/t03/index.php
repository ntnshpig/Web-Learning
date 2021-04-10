<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Router</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <p>Router</p>
        <?php
            include('Router.php');

            if($_GET) {
                $router = New Router();
                echo '<p>'.$router->getParams().'</p>';
            }
        ?>
    </main>
</body>
</html>
