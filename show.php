<?php

require_once 'Autoloader.php';
use Classes\Link;

// get uuid
if(!isset($_GET['uuid']) || empty($_GET['uuid'])) {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    die;
}

$uuid = strtolower($_GET['uuid']);

// check uuid and increment counter
$link = new Link();
$view_increment = $link->incrementCounter($uuid);

if($view_increment === false) {
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
    die;
}

// variables
$font_path = 'assets/fonts/font.ttf';
$font_size = 20;
$width = 200;
$height = 100;
$background_color = [1,1,1];
$text_color = [0, 125, 0];

// create image
$image = imagecreatetruecolor($width, $height);

// background color
$bg_color = imagecolorallocate($image, $background_color[0], $background_color[1], $background_color[2]);

imagefilledrectangle($image, 0, 0, $width, $height, $bg_color);

// font color
$txt_color = imagecolorallocate($image, $text_color[0], $text_color[1], $text_color[2]);

// image text
$text = "Views: " . $view_increment;

if(!file_exists($font_path)) {
    header("HTTP/1.0 500 Internal Server Error");
    echo "Font File not Found!";
    die;
}

// add text to image
$bbox = imagettfbbox($font_size, 0, $font_path, $text);
$x = ($width - ($bbox[2] - $bbox[0])) / 2;
$y = ($height - ($bbox[1] - $bbox[7])) / 2;


$y += $font_size;

imagettftext($image, $font_size, 0, $x, $y, $txt_color, $font_path, $text);

header('Content-Type: image/png');

imagepng($image);

imagedestroy($image);