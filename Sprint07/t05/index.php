<?php    
    session_start(); 
    error_reporting(0);
?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WhoIsWho</title>
</head>
<body>
    <h1>Parsing CSV data</h1>
    <form action="" method="POST">
        <span>Upload file: <input type="file" name="file"></span>
        <input type="submit" value="Upload" name="upload" id="fileSelect">
    </form>
    <?php
    $_SESSION['select'] = $_POST['select'];

    if (isset($_POST['file'])) {
        $_SESSION["file"] = $_POST['file'];
        unset($_POST['file']);
    }

    if (isset($_SESSION["file"])) {

        $file = fopen($_SESSION["file"], 'r');
        $array_text = [];
        $head_text = fgetcsv($file);
        for ($i=fgetcsv($file); $i != null; $i=fgetcsv($file)) { 
            array_push($array_text, $i);
        }

        $filter = $_SESSION['filter'];
        foreach($head_text as $key) {
            if (isset($_POST[$key])) {
                $filter = $key;
                unset($_POST[$key]);
                break;
            }
        }
        if ($filter == null) {
            $filter = $head_text[2];
        }
        $_SESSION['filter'] = $filter;


        echo '<form method="post" style="margin:10px;">';
        $filter_str = "<select name = 'select'><option>NOT SELECTED</option>";
        $temp = [];
        foreach($array_text as $key) {
            array_push($temp, $key[array_search($filter, $head_text)]);
        }
        $temp = array_unique($temp);
        foreach($temp as $key) {
            if ($_SESSION['select'] == $key) {
                $filter_str = $filter_str .'<option selected>' . $key . '</option>';
            } else {
                $filter_str = $filter_str .'<option>' . $key . '</option>';
            }
        }
        $filter_str = $filter_str . "</select>";
        echo "Filter: ".$filter_str.'<button>APLY</button></form>';
    }
    ?>
    <table style="border:1px solid black;">
    <?php
        $table_str = "";
        $head_str = "<tr>";
        foreach($head_text as $elem) { 
            $head_str = $head_str . '<form  method="post"> <td style="border:1px solid black;"> <button name = "'. $elem .'">' . $elem . " </button> </td> </form>";
        }
        $table_str = $head_str . "</tr>";

        if (!$_POST['select'] || $_POST['select'] == "NOT SELECTED") {
            foreach($array_text as $elem) {
                $table_str = $table_str . "<tr>";
                foreach($elem as $key) {
                    $table_str = $table_str . '<td style="border:1px solid black; ">'  . $key .  "</td>";
                }
                $table_str = $table_str . "</tr>";
            }
        } else {
            foreach($array_text as $elem) {
                if ($_POST['select'] == $elem[array_search($_POST['select'], $elem)] && (array_search($_POST['select'], $elem) == array_search($filter, $head_text) ) ) {
                $table_str = $table_str . "<tr>";
                foreach($elem as $key) {
                    $table_str = $table_str . '<td style="border:1px solid black;">' . $key .  "</td>";
                }
                $table_str = $table_str . "</tr>";
            }
            }
        }
        echo $table_str;
    ?>
    </table>
</body>
</html>