<?php

//Create a ImagickDraw object to draw into.
$draw = new \ImagickDraw();

$strokeColor = new \ImagickPixel("red");
$fillColor = new \ImagickPixel("rgba(100%, 100%, 100%, 0.2)");

$draw->setStrokeOpacity(1);
$draw->setStrokeColor($strokeColor);
$draw->setFillColor($fillColor);

$draw->setStrokeWidth(2);
$draw->setFontSize(17);

$draw->circle(58, 58, 98, 98);

$draw->setTextAlignment(\Imagick::ALIGN_CENTER);
$draw->annotation(60, 40, "auth\nseven\n2020-11-06");

$imagick = new \Imagick();
$imagick->newImage(120, 120, "white");
$imagick->setImageFormat("png");
$imagick->drawImage($draw);

header("Content-Type: image/png");
echo $imagick->getImageBlob();
