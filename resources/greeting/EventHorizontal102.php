<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'EventHorizontal'");
$new_message1 = str_replace("visitor",$visitor, 'Hi visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Thanks for visiting!');
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

$width  = (25 * strlen($longer_message));
$im = imagecreatetruecolor ($width,200);
$background = imagecolorallocate($im, 151, 191, 83);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 30, 0, 69, 96, $color, $font, $new_message1);
imagettftext($im, 30, 0, 70, 135, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>