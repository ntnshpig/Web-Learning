<?php
    $count = htmlspecialchars($_COOKIE["loaded"]);
    if($count) {
        setcookie("loaded", $count + 1, time() + 60);
    } else {
        setcookie("loaded", 1, time() + 60);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cookie counter</title>
</head>
<body>
    <h1>Cookie counter</h1>
    <p><?php
        $count = htmlspecialchars($_COOKIE["loaded"]);
        if($count) {
            $count++;
            echo "This page was loaded $count time(s) in last minute";
        } else {
            echo "This page was loaded 1 time(s) in last minute";
        }
    ?></p>
</body>
</html>