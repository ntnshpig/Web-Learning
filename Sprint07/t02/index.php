<?php
    session_start();
    if(isset($_POST['save']) || isset($_POST['clear'])) {
        header("Refresh:0");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hack it!</title>
</head>
<body>
    <h1>Password</h1>
    <?php 
        if(isset($_POST['check_pass']) && isset($_POST['guess'])) {
            if(password_verify($_POST['guess'], $_SESSION['data'])) {
                echo '<p style="color:green;">Hacked!</p>';
                unset($_SESSION['data']);
                session_destroy();
            } else {
                echo '<p style="color:red;">Access denied!</p>';
            }
        }
    ?>
    <form method="post" style="display:<?php echo !isset($_SESSION["data"]) ?  'block' : 'none'?>;">
        <span>Password not saved at session.</span><br>
        <span>Password for saving to session</span><input plaseholder="Password to session" name="password"><br>
        <span>Salt for saving to session_destroy</span><input plaseholder="Salt to session" name="salt"><br>
        <input type="submit" value="Save" name="save">
    </form>
    <form method="post" style="display:<?php echo isset($_SESSION["data"]) ?  'block' : 'none'?>;">
        <span>Password saved at session.</span><br>
        <span>Hash is <span></span><?php echo $_SESSION['data']; ?>.</span><br>
        <span>Try to guess</span><input plaseholder="Salt to session" name="guess"><input type="submit" value="Check password" name="check_pass">
        <br>
        <input type="submit" value="Clear" name="clear">
    </form>
    <?php
        if(isset($_POST['save']) && $_POST['password'] && $_POST['salt']) {
            $_SESSION['data'] = crypt($_POST['password'], $_POST['salt']);
        }
        if(isset($_POST['clear'])) {
            session_destroy();
        }
    ?>
</body>
</html>