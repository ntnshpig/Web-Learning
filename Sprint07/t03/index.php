<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Charset</title>
</head>
<body>
    <h1>Charset</h1>
    <form method="post"> 
        <span>Change charset:</span><input name="input_str" placeholder="Input string"><br>
        <span>Select charset or several charsets:</span>
        <select multiple name="code[]" size="3" name="charsets_list">
            <option>UTF-8</option>
            <option>ISO-8859-1</option>
            <option>Windows-1252</option>
        </select>
        <input type="submit" value="Change charset" name="charset">
        <input type="submit" value="Clear" name="Clear">
    </form>
    <?php
        if(isset($_POST["code"]) && isset($_POST["charset"])) {
            $_SESSION["str_to"] = $_POST['input_str'];
            foreach($_POST['code'] as $el => $val) {
                utf8_encode($_SESSION["str_to"]);
                echo "$val";
                $to = $val;
                if(strpos($val, "ISO") || $el == 1) {
                    $to = $to . "//TRANSLIT";
                }
                echo "<textarea name='str'>" . iconv("UTF-8", $to, $_SESSION["str_to"]) . "</textarea><br>";
            }
        }
        //€
    ?>
</body>
</html>