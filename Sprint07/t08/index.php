<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show other sites</title>
</head>
<body>
    <h1>Show other sites</h1>
    <form action="" method="POST">
        <input name="url" placeholder="url">
        <input type="submit" name="go" value="go">
        <a href="?back">BACK</a>
    </form>
    <?php
        if(isset($_POST['go'])) {
        echo '<div style="width:100%; display: flex;">
                <span style="width:100%; border-top: 1px solid black; border-bottom: 1px solid black;">' . "url: " . $_POST['url'] ."</span>
            </div><br>";

            $html = file_get_contents($_POST['url']);
            
            $html = explode("<body", $html)[1];
            $html = explode("</body>", $html)[0];
            $html = "<body" . $html . "</body>";

            $html = str_replace("<", "&#60;", $html);
            $html = str_replace(">", "&#62;", $html);
            $html = nl2br($html);
            echo $html;

            unset($_GET['back']);
        }
        if(isset($_GET['back'])) {
            echo("<p>Type an URL...</p>");
        }
    ?>
</body>
</html>