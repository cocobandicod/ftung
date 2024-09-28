<?php
// Generate captcha code
$captcha_code = generateCaptchaCode(6); // Jumlah karakter captcha

$captcha = $captcha_code;

function generateCaptchaCode($length)
{
    $chars = '0123456789';
    $code = '';
    for ($i = 0; $i < $length; $i++) {
        $code .= $chars[rand(0, strlen($chars) - 1)];
    }
    return $code;
}