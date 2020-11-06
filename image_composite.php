<?php

//Create a ImagickDraw object to draw into.
$draw = new \ImagickDraw();

$strokeColor = new \ImagickPixel("red");
$fillColor = new \ImagickPixel("none");

$draw->setStrokeOpacity(1);
$draw->setStrokeColor($strokeColor);
$draw->setFillColor($fillColor);

$draw->setStrokeWidth(2);

$draw->circle(65, 65, 110, 110);

$imagick = new \Imagick();
$imagick->newImage(140, 140, "white");
$imagick->setImageFormat("png");
$imagick->drawImage($draw);

$textImage = textImage();

// 合成
// ３，４番目の引数は、ベース画像の左上を０として、
// フレーム画像の左上をベース画像のどの位置に置くかを指定します。
// 今回は、写真に対する縁なので、両方０です。
$imagick->compositeImage($textImage, $textImage->getImageCompose(), 30, 40);

header("Content-Type: image/png");
echo $imagick->getImageBlob();

function textImage(){

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

  return $image;
}
