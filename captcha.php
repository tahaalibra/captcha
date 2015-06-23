<?php
session_start();
header('Content-Type: image/png');

class captcha
{
    public function create()
    {
        $im = imagecreatetruecolor(100, 30);

        $white  = imagecolorallocate($im, 255, 255, 255);
        $grey   = imagecolorallocate($im, 128, 128, 128);
        $black  = imagecolorallocate($im, 0, 0, 0);
        imagefilledrectangle($im, 0, 0, 100, 30, $white);

        $line_color = imagecolorallocate($im, 64,64,64);
        for($i=0;$i<10;$i++) {
            imageline($im,0,rand(0,30),100,rand(0,30),$line_color);
        }
//
//        $pixel_color = imagecolorallocate($im, 0,0,255);
//        for($i=0;$i<1000;$i++) {
//            imagesetpixel($im,rand()%200,rand()%50,$pixel_color);
//        }

        $text = $this->generateRandomString();
        $_SESSION['captcha'] = $text;

        imagestring($im,100,5,5,$text,$black);

//        $font                = 'arial.ttf';
//        imagettftext($im, 20, 0, 11, 21, $grey, $font, $text);
//        imagettftext($im, 20, 0, 9, 19, $black, $font, $text);
        imagepng($im);
        imagedestroy($im);
    }

    public function generateRandomString($length = 5)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

}

$captcha =  new captcha;
$captcha->create();

