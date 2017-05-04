<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'rukiach'");
$new_message1 = str_replace("visitor",$visitor, 'Hey, visitor! Welcome to my profile.');
$new_message2 = str_replace("visitor",$visitor, '      I hope you like it :)');
$font = './uploaded_fonts/' . 'Rock.TTF';

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

$width  = (12 * strlen($longer_message));
$im = imagecreatetruecolor ($width,154);
$background = imagecolorallocate($im, 255, 59, 196);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 15, 0, 34, 43, $color, $font, $new_message1);
imagettftext($im, 15, 0, 34, 113, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>