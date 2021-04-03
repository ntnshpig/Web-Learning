<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>What about forms?</title>
</head>
<body>
    <h1>What Thanos did to get the Soul Stone?</h1>
    <form action="index.php" method="post">
        <input type="radio" name="answ" value="1">Jumped from the mountain</input><br>
        <input type="radio" name="answ" value="2">Made stone keeper to jump from the mountain</input><br>
        <input type="radio" name="answ" value="3">Pushed Gamora off the mountain</input><br><br>

        <input type="submit" value="I made a choice!"></input><br><br>
    </form>

    <p>
        <?php
            $answ = $_POST["answ"];
            if($answ) {
                if($answ == "3")
                    echo "That's right!";
                else
                    echo "You bastard! You must watch this masterpiece again!";
            }
        ?>
    </p>
</body>
</html>