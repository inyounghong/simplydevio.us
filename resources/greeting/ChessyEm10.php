<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'ChessyEm'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hey, visitor!123456789123456789123456789');
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
$width  = (36 * strlen($longer_message));
$im = imagecreatetruecolor ($width,85);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 189, 45, 185);
imagettftext($im, 14, 0, 0, 68, $color, $font, $new_message1);
imagettftext($im, 14, 0, 0, 50, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>