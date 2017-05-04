<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'BronyCooper'");
$new_message1 = str_replace("visitor",$visitor, 'Ello visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Thanks for visiting my Page!');
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
$width  = (13 * strlen($longer_message));
$im = imagecreatetruecolor ($width,91);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 177, 117, 255);
imagettftext($im, 21, 0, 96, 27, $color, $font, $new_message1);
imagettftext($im, 21, 0, 51, 62, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>