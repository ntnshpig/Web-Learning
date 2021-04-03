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
    <title>Notepad mini</title>
</head>
<body>
    <h1>Notepad mini</h1>
    <form method="POST" style="display:flex; flex-flow:column; padding:10px; margin:10px; width:300px;">
        <input name="note_name" placeholder="Name" style="margin:10px">
        <select name="importance[]" style="margin:10px">
            <option selected>low</option>
            <option>medium</option>
            <option>high</option>
        </select>
        <textarea name="content" placeholder="Textof note ..." style="margin:10px"></textarea>
        <input type="submit" value="Create" name="create_note" style="margin:10px">
        <?php
            if($_POST['note_name'] && $_POST['content'] && isset($_POST['create_note'])) {
                $new_note = new Note($_POST['note_name'], $_POST['importance'], $_POST['content']);
                $note_pad = NULL;
                if(file_exists("NotePad")){
                    $file_content = file_get_contents("NotePad");
                    $note_pad = unserialize($file_content);
                    $note_pad->unserializeArray();
                } else {
                    fclose(fopen("NotePad", 'c'));
                    $note_pad = new NotePad();
                }
                
                $note_pad->addNote($new_note);
                $note_pad->addSerializeNote($new_note);
                $note_pad->notes = NULL;
                file_put_contents("NotePad", serialize($note_pad));
                $note_pad->unserializeArray();
            }
        ?>
    </form>
    <h2>List of notes</h2>
    <?php 
        if(file_exists("NotePad")) {
            $file_content = file_get_contents("NotePad");
            $note_pad = unserialize($file_content);
            $note_pad->unserializeArray();
            if(isset($note_pad->notes)) {
                echo '<ul>';
                foreach($note_pad->notes as $el) {
                    echo '<li><a href="?note_content=' . $el->name . '">' . $el->date . ' > ' . $el->name
                    . '</a><a href="?delet_note=' . $el->name . '"> DELETE</a></li>';
                }
                echo '</ul>';
            }
        }
    ?>
    <h2>Detail of <?php
    if(isset($_GET['note_content'])) {
        echo " \"" . $_GET['note_content'] . "\"";
    }
    ?></h2>
    <?php
        if(isset($_GET['note_content'])) {
            if(file_exists("NotePad")) {
                $file_content = file_get_contents("NotePad");
                $note_pad = unserialize($file_content);
                $note_pad->unserializeArray();

                echo "<ul>";
                foreach($note_pad->notes as $el) {
                    if($el->name == $_GET['note_content']) {
                        echo "<li>date: <b> $el->date</b></li>";
                        echo "<li>name: <b> $el->name</b></li>";
                        echo "<li>importance: <b> " . $el->importance[0] . "</b></li>";
                        echo "<li>content: <b> $el->content</b></li>";
                    }
                }
                echo "</ul>";
            }
        }
        if(isset($_GET['delet_note'])) {
            if(file_exists("NotePad")) {
                $file_content = file_get_contents("NotePad");
                $note_pad = unserialize($file_content);
                $note_pad->unserializeArray();

                fclose(fopen ("NotePad", "w+"));
                
                $note_pad->deleteElement($_GET['delet_note']);
                $note_pad->notes = NULL;
                file_put_contents ("NotePad", serialize($note_pad));

                echo '<script>window.location = window.location.href.split("?")[0];</script>';
            }
        }
    ?>
</body>
</html>