<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'Pikamew322'");
$new_message1 = str_replace("visitor",$visitor, 'Hiya, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Enjoy your stay here!~');
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

$width  = (21 * strlen($longer_message));
$im = imagecreatetruecolor ($width,161);
$background = imagecolorallocate($im, 29, 29, 29);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 34, 0, 39, 63, $color, $font, $new_message1);
imagettftext($im, 34, 0, 81, 134, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>