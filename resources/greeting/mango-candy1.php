<?
session_start();
header('Content-type: image/png');

$visitor = exec("python ../image.py 'mango-candy'");
$new_message1 = str_replace("visitor",$visitor, 'hey, visitor!');
$new_message2 = str_replace("visitor",$visitor, 'welcome to my page! ');
$font = './uploaded_fonts/' . 'BLKCHCRY.TTF';

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

$width  = (23 * strlen($longer_message));
$im = imagecreatetruecolor ($width,136);
$background = imagecolorallocate($im, 245, 246, 250);
imagefill($im,0,0,$background);

$color = imagecolorallocate($im, 158, 162, 191);

imagettftext($im, 30, 0, 25, 50, $color, $font, $new_message1);
imagettftext($im, 30, 0, 25, 102, $color, $font, $new_message2);

imagepng($im);
imagedestroy($im);

?>