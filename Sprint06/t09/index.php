<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A new set</title>
</head>
<body>
    <h1>New Avenger application</h1>
    <div style="height: 200px; padding: 10px 10px 10px 40px; border: 2px solid black; background-color: darkgray; margin-bottom: 20px;">
        <p>POST</p>

        <?php 
            $arr = [
                "name" => $_POST["name"],
                "email" => $_POST["email"],
                "age" => $_POST["age"],
                "description" => $_POST["description"],
                "photo" => $_POST["photo"]
            ];
            
            echo "<pre>";
            print_r($arr);
            echo "</pre>";
        ?>
    </div>
    <form action="index.php" method="post" style="padding:10px; border: 1px solid black;">
        <fieldset style="border: 1px solid black; padding: 20px 10px; margin:20px">
            <legend>About candidate</legend>
            <span>Name</span>
            <input type="text" name="name" placeholder="Tell your name"></input>
            <span>E-mail</span>
            <input type="text" name="e-mail" placeholder="Tell your e-mail"></input>
            <span>Age</span>
            <input type="number" name="age" size="6" min="1" max="999" step="1"></input><br><br>
            <span>About</span>
            <textarea rows="6" cols="50" name="description" maxlength="500" placeholder="Tell about yourself, max 500 symbols"></textarea><br><br>
            <span>Your Photo:</span>
            <input type="file" name="photo"> </input>
        </fieldset>

        <input class="clear_button" type="reset" value="CLEAR"></input>
        <input class="send_button" type="submit" value="SEND"></input>
    </form>
</body>
</html>