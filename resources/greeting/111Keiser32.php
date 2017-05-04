<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image_with_name.py '111Keiser'");
$new_message1 = str_replace("visitor",$visitor, 'Welcome, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'Hope you enjoy your visit to my profile!');
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

$width  = (27 * strlen($longer_message));
$im = imagecreatetruecolor ($width,72);
$background = imagecolorallocate($im, 0, 0, 0);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 255, 255, 255);

imagettftext($im, 15, 0, 200, 20, $color, $font, $new_message1);
imagettftext($im, 15, 0, 120, 50, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>