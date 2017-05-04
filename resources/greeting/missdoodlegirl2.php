<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'missdoodlegirl'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! ');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page.');
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
$width  = (22 * strlen($longer_message));
$im = imagecreatetruecolor ($width,129);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 199, 32, 93);
imagettftext($im, 24, 0, 131, 43, $color, $font, $new_message1);
imagettftext($im, 24, 0, 107, 80, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>