<?
session_start();
header('Content-type: image/png');
$visitor = exec("python ../image_with_name.py 'Nightshade-Galaxy'");
$new_message1 = str_replace("visitor",$visitor, 'To the visiting visitor, ');
$new_message2 = str_replace("visitor",$visitor, 'Thank you Darling for dropping by! <3');
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
$width  = (27 * strlen($longer_message));
$im = imagecreatetruecolor ($width,174);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);
$color = imagecolorallocate($im, 0, 128, 255);
imagettftext($im, 50, 0, 42, 71, $color, $font, $new_message1);
imagettftext($im, 50, 0, 94, 146, $color, $font, $new_message2);
imagepng($im);
imagedestroy($im);
?>