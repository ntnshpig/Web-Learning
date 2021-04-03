<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Make square image</title>
</head>
<body>
    <h1>Make square image</h1>
    <form action="index.php" method="post">
        <input type="url" name="url" placeholder="Image url" class="input_url"><br>
        <input type="submit" value="GO" name="go">
    </form>

    <?php 
        if(isset($_POST["go"]) && $_POST["url"]){
            $image_path = "photo";

            $ch = curl_init($_POST["url"]);
            $fp = fopen($image_path, 'wb');
            curl_setopt($ch, CURLOPT_FILE, $fp);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);
            fclose($fp);

            if(strpos($_POST["url"], ".jpg") || strpos($_POST["url"], ".jpeg")) {

                $size_x = ImagesX(imagecreatefromjpeg($image_path));
                $size_y = ImagesY(imagecreatefromjpeg($image_path));
                $fin = imagecreatetruecolor($size_x * 2, $size_y * 2);

                $red = imagecreatefromjpeg($image_path);
                imagefilter($red, IMG_FILTER_COLORIZE, 255, 0, 0);

                $green = imagecreatefromjpeg($image_path);
                imagefilter($green, IMG_FILTER_COLORIZE, 0, 255, 0);

                $blue = imagecreatefromjpeg($image_path);
                imagefilter($blue, IMG_FILTER_COLORIZE, 0, 0, 255);

                imagecopyresampled($fin, imagecreatefromjpeg($image_path), 0, 0, 0, 0, $size_x, $size_y, $size_x, $size_y);
                imagecopyresampled($fin, $red, $size_x, 0, 0, 0, $size_x, $size_y, $size_x, $size_y);
                imagecopyresampled($fin, $green, 0, $size_y, 0, 0, $size_x, $size_y, $size_x, $size_y);
                imagecopyresampled($fin, $blue, $size_x, $size_y, 0, 0, $size_x, $size_y, $size_x, $size_y);

                imagejpeg($fin, "res.jpg");
                echo '<img src="res.jpg">';
            } else if (strpos($_POST["url"], ".png")) {

                $size_x = ImagesX(imagecreatefrompng($image_path));
                $size_y = ImagesY(imagecreatefrompng($image_path));
                $fin = imagecreatetruecolor($size_x * 2, $size_y * 2);

                $red = imagecreatefrompng($image_path);
                imagefilter($red, IMG_FILTER_COLORIZE, 255, 0, 0);

                $green = imagecreatefrompng($image_path);
                imagefilter($green, IMG_FILTER_COLORIZE, 0, 255, 0);

                $blue = imagecreatefrompng($image_path);
                imagefilter($blue, IMG_FILTER_COLORIZE, 0, 0, 255);

                imagecopyresampled($fin, imagecreatefrompng($image_path), 0, 0, 0, 0, $size_x, $size_y, $size_x, $size_y);
                imagecopyresampled($fin, $red, $size_x, 0, 0, 0, $size_x, $size_y, $size_x, $size_y);
                imagecopyresampled($fin, $green, 0, $size_y, 0, 0, $size_x, $size_y, $size_x, $size_y);
                imagecopyresampled($fin, $blue, $size_x, $size_y, 0, 0, $size_x, $size_y, $size_x, $size_y);

                imagejpeg($fin, "res.png");
                echo '<img src="res.png">';
            }
        }
    ?>
</body>
</html>