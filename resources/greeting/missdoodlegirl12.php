<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py 'missdoodlegirl'");
$new_message1 = str_replace("visitor",$visitor, 'Hi there, visitor! ');
$new_message2 = str_replace("visitor",$visitor, '');
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

$width  = (11 * strlen($longer_message));
$im = imagecreatetruecolor ($width,50);
$background = imagecolorallocate($im, 255, 255, 255);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 189, 49, 96);

imagettftext($im, 23, 0, 0, 39, $color, $font, $new_message1);
imagettftext($im, 23, 0, 0, 50, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>