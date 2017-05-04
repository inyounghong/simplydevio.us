<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'PonyOfTardis'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page! ');
$new_message2 = str_replace("visitor",$visitor, 'Enjoy your stay, visitor!');
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
$width  = (16 * strlen($longer_message));
$im = imagecreatetruecolor ($width,134);
$background = imagecolorallocate($im, 243, 255, 204);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 0, 0);
imagettftext($im, 29, 0, 96, 51, $color, $font, $new_message1);
imagettftext($im, 29, 0, 51, 110, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>