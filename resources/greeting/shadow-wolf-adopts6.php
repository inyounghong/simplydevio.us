<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'shadow-wolf-adopts'");
$new_message1 = str_replace("visitor",$visitor, 'Greetings, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Welcome to my adopt page.~');
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
$im = imagecreatetruecolor ($width,93);
$background = imagecolorallocate($im, 255, 167, 51);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 41, 41, 41);

imagettftext($im, 22, 0, 4, 35, $color, $font, $new_message1);
imagettftext($im, 22, 0, 18, 66, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>