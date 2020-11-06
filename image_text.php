<?php

/* Text to write */
$text = "auth\nseven\n2020-11-06";

/* Create Imagick objects */
$image = new Imagick();
$draw = new \ImagickDraw();
$color = new \ImagickPixel('red');
$background = new \ImagickPixel('none'); // Transparent

/* Font properties */
// $draw->setFont('Arial');
$draw->setFontSize(15);
$draw->setFillColor($color);
$draw->setStrokeAntialias(true);
$draw->setTextAntialias(true);

/* Get font metrics */
$metrics = $image->queryFontMetrics($draw, $text,true);

/* Create text */
$draw->setTextAlignment(\Imagick::ALIGN_CENTER);
$draw->annotation(30, $metrics['ascender'], $text);

/* Create image */
$image->newImage($metrics['textWidth'], $metrics['textHeight'], $background);
$image->setImageFormat('png');
$image->drawImage($draw);

header("Content-Type: image/png");
echo $image->getImageBlob();
