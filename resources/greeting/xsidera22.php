<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'xsidera'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor! My name is Sidera');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my page!');
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
$im = imagecreatetruecolor ($width,114);
$background = imagecolorallocate($im, 0, 140, 171);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 37, 0, 0, 48, $color, $font, $new_message1);
imagettftext($im, 37, 0, 102, 97, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>