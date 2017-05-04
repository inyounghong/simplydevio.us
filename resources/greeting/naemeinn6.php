<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Naemeinn'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Have a hug from me! :3');
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
$width  = (10 * strlen($longer_message));
$im = imagecreatetruecolor ($width,71);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 117, 117);
imagettftext($im, 17, 0, 41, 30, $color, $font, $new_message1);
imagettftext($im, 17, 0, 88, 56, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>