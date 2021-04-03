<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Marvel API</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
    <h1>Comics from Marvel API</h1>
    <?php
        $public_key = "32e5b6206be79d2a13a6a8c0891e4466";
        $private_key = "a5b6bf7f73fcabdf2df978bdecad71babc0057d8";
        $hash = md5(time().$private_key.$public_key);
        $api = "http://gateway.marvel.com/v1/public/comics?ts=".time()."&apikey=".$public_key."&hash=".$hash;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $api);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $json = curl_exec($curl);
        curl_close($curl);
        echo(parseJSON(json_decode($json, true)));

        function parseJSON($json) {
            $output = "<div class=\"block\">";
            foreach ($json as $el => $val) {
                if (is_array($val)) {
                    $output .= "<span class=\"title\"><br>$el:</span>";
                    $output .= parseJSON($val);
                }  else {
                    $output .= "<div class=\"el\">
                            <span class=\"el_title\">$el: </span>
                            <span class=\"value\">$val</span>
                        </div> ";
                }
            }
            return $output."</div>";
        }
    ?>
</body>
</html>