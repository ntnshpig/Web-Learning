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
    <title>Data to XML</title>
</head>
<body>
    <h1>Avenger Quote to XML</h1>
    <?php
        $avengerQuote1 = new AvengerQuote(4, " Pangolier", " I saw that.", [ "pangolier1.jpg", "pangolier2.jpeg" ]);
        $avengerQuote1->addComment("Try a bit harder next time…");
        $avengerQuote1->addComment("So this whole mess is all your fault?");
        $avengerQuote1->addComment("Now it's just unfair.");

        $avengerQuote2 = new AvengerQuote(1, "Pudge", "FRESH MEAT", [ "pudge1.jpg", "pudge2.jpg", "pudge3.jpg" ]);
        $avengerQuote2->addComment("Delicious…");
        $avengerQuote2->addComment("Oh, kidneys. Kidneys is nice.");

        $avengerQuote3 = new AvengerQuote(2, "Phoenix", "Laughing Squawk", [ "phoenix1.jpg", "phoenix2.png" ]);
        $avengerQuote3->addComment("Denying Squawk");
        $avengerQuote3->addComment("Battle squawk");


        $listAvengerQuote = new ListAvengerQuotes();
        $listAvengerQuote->addAvengerQuote($avengerQuote1);
        $listAvengerQuote->addAvengerQuote($avengerQuote2);
        $listAvengerQuote->addAvengerQuote($avengerQuote3);
        $listAvengerQuote->toXML("file.xml");

        echo '<div style="display:flex; flex-flow:row;"><div><h3>To XML</h3><pre>';
        print_r($listAvengerQuote); 
        echo '</pre></div><div><h3>From XML</h3><pre>';
        print_r($listAvengerQuote->fromXML("file.xml"));
        echo '</pre></div></div>';
    ?>
</body>
</html>