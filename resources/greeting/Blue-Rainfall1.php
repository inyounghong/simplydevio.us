<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Blue-Rainfall'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Happy holidays!');
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
$width  = (28 * strlen($longer_message));
$im = imagecreatetruecolor ($width,95);
$background = imagecolorallocate($im, 43, 192, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 31, 0, 0, 36, $color, $font, $new_message1);
imagettftext($im, 31, 0, 0, 78, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>