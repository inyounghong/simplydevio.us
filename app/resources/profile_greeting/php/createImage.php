<?php

// Generate real image
if ($_GET["generate"] == "true") {
    writeImageToFile($_GET["filename"], "image.py");
} else {
    // Only update display image
    writeImageToFile("display.php", "image_with_name.py");
}

// Generates image file with name [filename] using given [image_details]
function writeImageToFile($filename, $script) {

    $filepath = "../user_greetings/" . $filename;
    $file = fopen($filepath, "w") or die("Unable to open file!");

    $visitor = $_GET['visitor'];
    $username = $_GET['username'];
    $default = $_GET['default'];
    $message1 = $_GET['message1'];
    $message2 = $_GET['message2'];
    $font = $_GET['font'];
    $font_size = $_GET['fontSize'];
    $paddingX = $_GET['paddingX'];
    $paddingY = $_GET['paddingY'];
    $line_spacing = $_GET['lineSpacing'];
    $transparent = $_GET['transparent'];
    $font = "'../uploaded_fonts/$font'";

    # Get colors
    list($r, $g, $b) = sscanf(substr($_GET["color"], 1), "%02x%02x%02x");
    list($br, $bg, $bb) = sscanf(substr($_GET["background"], 1), "%02x%02x%02x");

    # If we have no visitor stored, then we need to scrape the page
    if ($visitor == "") {
        $exec = "python ../python/$script $username $default";
        $visitor = exec($exec);
    }
    $visitorString = "'".$visitor."'";
    echo $visitor;

    # For the recommended image, include execute function
    if ($script == "image.py") {
        $visitorString = "exec('python ../python/$script $username $default')";
    }

    if ($transparent == "true") {
        $imageFillString = "imagefill($"."im,0,0,0x7fff0000)";
    } else {
        $imageFillString = "imagefill($"."im,0,0,$"."background)";
    }

    $string = "<?
header('Content-type: image/png');
$"."visitor"." = $visitorString;
$"."new_message1 = str_replace('visitor', $"."visitor, '$message1');
$"."new_message2 = str_replace('visitor', $"."visitor, '$message2');

$"."text_box1 = imagettfbbox($font_size, 0, $font, $"."new_message1);
$"."text_width1 = $"."text_box1[2] - $"."text_box1[0];
$"."full_width1 = $"."text_width1 + ($paddingX * 2);

$"."text_box2 = imagettfbbox($font_size, 0, $font, $"."new_message2);
$"."text_width2 = $"."text_box2[2] - $"."text_box2[0];
$"."full_width2 = $"."text_width2 + ($paddingX * 2);

$"."text_height = $"."text_box2[1] - $"."text_box2[5];

if ($"."full_width1 >= $"."full_width2) {
    $"."width = $"."full_width1;
    $"."x1 = $paddingX;
    $"."x2 = ($"."width - $"."text_width2)/2;
} else {
    $"."width = $"."full_width2;
    $"."x2 = $paddingX;
    $"."x1 = ($"."width - $"."text_width1) / 2;
}

$"."y1 = $paddingY + $font_size;
$"."y2 = $"."y1 + $line_spacing + $"."text_height;
$"."height = $"."y2 + $paddingY + $font_size/2;

$"."im = imagecreatetruecolor ($"."width, $"."height);
imagealphablending($"."im, true);
imagesavealpha($"."im, true);
$"."background = imagecolorallocate($"."im, $br, $bg, $bb);
$imageFillString;
$"."color = imagecolorallocate($"."im, $r, $g, $b);
imagettftext($"."im, $font_size, 0, $"."x1, $"."y1, $"."color, $font, $"."new_message1);
imagettftext($"."im, $font_size, 0, $"."x2, $"."y2, $"."color, $font, $"."new_message2);
imagepng($"."im);
imagedestroy($"."im);
?>";

    fwrite($file, $string) or die ("Error in writing");
    fclose($file);
}

?>
