<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'astralseed'");
$new_message1 = str_replace("visitor",$visitor, 'Hi, visitor!');
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

$width  = (14 * strlen($longer_message));
$im = imagecreatetruecolor ($width,92);
$background = imagecolorallocate($im, 40, 156, 106);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 22, 0, 0, 35, $color, $font, $new_message1);
imagettftext($im, 22, 0, 0, 73, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>