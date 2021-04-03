<?php
    session_start();
    function autoload($pClassName) {
        include(__DIR__. '/' . $pClassName. '.php');
    } 
    spl_autoload_register("autoload");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Files</title>
</head>
<body>
    <h1>Files</h1>
    <form method="POST">
        <span>File name: <input name="file_name"></span>
        <span>Content: <textarea name="file_content"></textarea></span>
        <input type="submit" value="Create file" name="create_file">
        <?php
            if(isset($_POST['create_file']) && $_POST['file_name']) {
                $file = new File("tmp/" . $_POST['file_name']);
                $file->write($_POST['file_content']);
            }
        ?>
    </form>
    <form method="POST">
        <h2>List of files:</h2>
        <?php
            $_SESSION['file_array'] = new FilesList("tmp");
            echo $_SESSION['file_array']->toList();
        ?>
        <h2>Selected file:
        <?php
            if(isset($_GET["file"])) {
                echo '"tmp/' . $_GET["file"] . '"';
            }
        ?></h2>
        <input type="submit" value="Deleate file" name="delete_file">
        <?php
            if(isset($_GET["file"])) {
                $file_out = new File("tmp/" . $_GET['file']);
                echo "<br>" . file_get_contents($file_out->file_name);
            }
            if(isset($_POST['delete_file']) && isset($_GET["file"])) {
                unlink("tmp/" . $_GET["file"]);
                unset($_GET["file"]);
                echo '<script>window.location = window.location.href.split("?")[0];</script>';
            }
        ?>
    </form>
</body>
</html>