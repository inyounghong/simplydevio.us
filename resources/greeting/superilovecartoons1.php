<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image.py 'superilovecartoons'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'WELCOME TO MY CHAMBER');
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
$width  = (23 * strlen($longer_message));
$im = imagecreatetruecolor ($width,109);
$background = imagecolorallocate($im, 232, 232, 232);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 23, 23, 23);
imagettftext($im, 23, 0, 173, 46, $color, $font, $new_message1);
imagettftext($im, 23, 0, 114, 82, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>