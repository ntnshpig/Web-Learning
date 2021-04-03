<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SERVER</title>
</head>
<body>
    <?php
        echo $_SERVER["PHP_SELF"]." <br>"; 
        echo $_SERVER["argv"];  
        echo $_SERVER["SERVER_ADDR"]." <br>"; 
        echo $_SERVER["HTTP_HOST"]." <br>";      
        echo $_SERVER["SERVER_PROTOCOL"];       
        echo $_SERVER["QUERY_STRING"]." <br>";     
        echo $_SERVER["HTTP_USER_AGENT"]." <br>";   
        echo $_SERVER["REMOTE_ADDR"]." <br>";       
        echo $_SERVER["REQUEST_URI"]." <br>";       
    ?>
</body>
</html>