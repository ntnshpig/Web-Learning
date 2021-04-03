<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Session for new</title>
</head>
<body>
    <h1>Session for new</h1>
    <form action="index.php" method="post" style="padding:10px; border: 1px solid black; display:<?php echo isset($_POST["send"]) ?  'none;' : 'block;'?>">
        <fieldset style="border: 1px solid black; padding: 20px 10px; margin:20px;">
            <legend>About HERO</legend>
            <span>Name</span>
            <input type="text" name="name" placeholder="Real Mame"></input>
            <span>E-mail</span>
            <input type="text" name="alias" placeholder="Current Alias"></input>
            <span>Age</span>
            <input type="number" name="age" size="6" min="1" max="999" step="1"></input><br><br>
            <span>About</span>
            <textarea rows="6" cols="50" name="description" maxlength="500" placeholder="Tell about yourself, max 500 symbols"></textarea><br><br>
            <span>Your Photo:</span>
            <input type="file" name="photo"> </input>
        </fieldset>
        <fieldset style="border: 1px solid black; padding: 20px 10px; margin:20px;">
            <legend>Powers</legend>
            <input type="checkbox" name="Strength"> <span>Strength</span>
            <input type="checkbox" name="Speed"> <span>Speed</span>
            <input type="checkbox" name="Intelligence"> <span>Intelligence</span>
            <input type="checkbox" name="Teleportation"> <span>Teleportation</span>
            <input type="checkbox" name="Immortal"> <span>Immortal</span>
            <input type="checkbox" name="Another"> <span>Another</span>
            <br><br><span>Level of control:</span>
            <input type="range" id="level" name="level" min="0" max="10" value="0">
        </fieldset>
        <fieldset style="border: 1px solid black; padding: 20px 10px; margin:20px;">
            <legend>Publicity</legend>
            <input type="radio" name="or_radio" value="UNKNOWN"> <span>UNKNOWN</span>
            <input type="radio" name="radio" value="LIKE A GHOST"> <span>LIKE A GHOST</span>
            <input type="radio" name="radio" value="I AM IN COMICS"> <span>I AM IN COMICS</span>
            <input type="radio" name="radio" value="I HAVE FUN CLUB"> <span>I HAVE FUN CLUB</span>
            <input type="radio" name="radio" value="SUPERSTAR"> <span>SUPERSTAR</span>
        </fieldset>

        <input class="clear_button" type="reset" value="CLEAR"></input>
        <input class="send_button" type="submit" value="SEND" name="send"></input>
    </form>
        <div style="height: 200px; padding: 10px 10px 10px 40px; margin-bottom: 20px; display:<?php echo !isset($_POST["send"]) ?  'none;' : 'block;'?>">
            <?php 
                $arr = [
                    "name" => $_POST["name"],
                    "alias" => $_POST["alias"],
                    "age" => $_POST["age"],
                    "description" => $_POST["description"],
                    "photo" => $_POST["photo"],
                    "level" => $_POST["level"],
                    "Publicity" => $_POST["radio"],
                    "Strength" => $_POST["Strength"] ? $_POST["Strength"] : 0,
                    "Speed" => $_POST["Speed"] ? $_POST["Speed"] : 0,
                    "Intelligence" => $_POST["Intelligence"] ? $_POST["Intelligence"] : 0,
                    "Teleportation" => $_POST["Teleportation"] ? $_POST["Teleportation"] : 0,
                    "Immortal" => $_POST["Immortal"] ? $_POST["Immortal"] : 0,
                ];
                
                $_SESSION["answ"] = $arr;

                if(isset($_SESSION["answ"])) {
                    foreach($arr as $str => $val) {
                        if($val) {
                            echo "$str : $val <br>";
                        }
                    }
                }

                if(!isset($_POST['forget'])) {
                    session_destroy();
                }
            ?>
            <form style="border: 1px solid black; padding: 20px 10px; margin-top:20px;">
                <input class="forget_button" type="submit" value="FORGET" name="forget"></input>
            </form>
        </div>
</body>
</html>