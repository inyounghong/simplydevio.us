<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Macy-Draws'");
$new_message1 = str_replace("visitor",$visitor, 'Hello, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Thanks for visiting my page!');
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
$width  = (18 * strlen($longer_message));
$im = imagecreatetruecolor ($width,120);
$background = imagecolorallocate($im, 50, 194, 199);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 255, 255, 255);
imagettftext($im, 35, 0, 103, 42, $color, $font, $new_message1);
imagettftext($im, 35, 0, 29, 101, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>