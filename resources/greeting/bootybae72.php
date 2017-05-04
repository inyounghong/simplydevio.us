<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'bootybae'");
$new_message1 = str_replace("visitor",$visitor, 'HEYO!!');
$new_message2 = str_replace("visitor",$visitor, 'THANKS FOR VISITING <3');
$font = './uploaded_fonts/' . 'KGSevenSixteen.ttf';

# Determine the longer of the two  messages
if (strlen($new_message2) > 0)
{
    if (strlen($new_message1) <= strlen($new_message2))
    {
        $longer_message = $new_message2;
    }
    else
    {
        $longer_message = $new_message1;
    }
}
else
{
    $longer_message = $new_message1;
}

$width  = (17 * strlen($longer_message));
$im = imagecreatetruecolor ($width,104);
$background = imagecolorallocate($im, 94, 94, 94);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 30, 0, 135, 46, $color, $font, $new_message1);
imagettftext($im, 30, 0, 19, 85, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>