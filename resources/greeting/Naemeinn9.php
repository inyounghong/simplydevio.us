<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'Naemeinn'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome to my page, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Have a hug from me!');
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
$im = imagecreatetruecolor ($width,92);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 138, 157);
imagettftext($im, 21, 0, 12, 34, $color, $font, $new_message1);
imagettftext($im, 21, 0, 11, 73, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>